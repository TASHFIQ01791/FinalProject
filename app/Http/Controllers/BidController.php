<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Mail\BidWinnerNotification;
use Illuminate\Support\Facades\Mail;
use DB;

class BidController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $bids = Bid::select('bids.*')
            ->join(DB::raw('(SELECT product_id, MAX(bid_amount) as max_bid_amount FROM bids GROUP BY product_id) as max_bids'), function ($join) {
                $join->on('bids.product_id', '=', 'max_bids.product_id')
                     ->on('bids.bid_amount', '=', 'max_bids.max_bid_amount');
            })
            ->where('bids.status', '<>', 2) // Exclude confirmed bids
            ->when($search, function($query, $search) {
                return $query->whereHas('user', function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('product', function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhere('bid_amount', 'like', "%{$search}%");
            })
            ->with('user', 'product') // Eager load relationships to avoid N+1 issue
            ->paginate(4); // Adjust the pagination as needed

        return view('admin.Bids.bids', compact('bids'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('bids.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($productId);

        $bid = new Bid();
        $bid->product_id = $productId;
        $bid->user_id = Auth::id();
        $bid->bid_amount = $request->bid_amount;
        $bid->save();

        return redirect()->route('bids.show', $productId)->with('success', 'Bid placed successfully!');
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $bids = Bid::where('product_id', $productId)->orderBy('bid_amount', 'desc')->get();
        return view('bids.show', compact('product', 'bids'));
    }

    public function updateBidStatus(Request $request, $id)
    {
        $bid = Bid::findOrFail($id);
        $bid->status = $request->status;
        $bid->save();

        if ($request->status == 2) { // Confirmed
            $product = $bid->product;
            $product->winner_id = $bid->user_id;
            $product->save();

            // Mark all other bids for this product as cancelled
            Bid::where('product_id', $product->id)
                ->where('id', '!=', $id)
                ->update(['status' => 3]); // Cancelled

            // Send email notification to the winner
            Mail::to($bid->user->email)->send(new BidWinnerNotification($bid, $product));

            // Optional: Set session data to track the winner and the product they bid on
            session()->put('bid_winner', [
                'user_id' => $bid->user_id,
                'product_id' => $product->id,
                'bid_amount' => $bid->bid_amount
            ]);
        }

        return redirect()->back()->with('success', 'Bid status updated successfully!');
    }
    public function declareWinner($productId)
    {
        $product = Product::findOrFail($productId);
        $highestBid = $product->bids()->orderBy('bid_amount', 'desc')->first();

        if ($highestBid) {
            $product->winner_id = $highestBid->user_id;
            $product->save();

            // Send email to the winner
            Mail::to($highestBid->user->email)->send(new BidWinnerNotification($highestBid, $product));
        }
    }


    public function confirmBid($bidId)
    {
        $bid = Bid::find($bidId);
        $product = $bid->product;

        if ($bid) {
            // Confirm the bid
            $bid->status = 'confirmed';
            $bid->save();

            // Send the winner notification email
            Mail::to($bid->user->email)->send(new BidWinnerNotification($bid, $product));
        }

        return redirect()->back()->with('status', 'Bid confirmed and email sent!');
    }

    // public function notifyWinner($bidId)
    // {
    //     $bid = Bid::findOrFail($bidId);
    //     $product = Product::findOrFail($bid->product_id);
    //     $user = $bid->user;

    //     // Send the email
    //     Mail::to($user->email)->send(new BidWinnerNotification($bid, $product));

    //     return response()->json(['message' => 'Notification email sent.']);
    // }


}
