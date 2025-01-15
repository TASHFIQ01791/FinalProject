<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Product;
use Auth;

class UserBidController extends Controller
{
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $bids = Bid::where('product_id', $productId)->orderBy('bid_amount', 'desc')->get();
        return view('users.bids.show', compact('product', 'bids'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($productId);
        $highestBid = Bid::where('product_id', $productId)->orderBy('bid_amount', 'desc')->first();
        $regularPrice = $product->regular_price;
        $startingPrice = $product->starting_price;
        $bidAmount = $request->bid_amount;

        // if ($request->bid_amount < $startingPrice || $request->bid_amount <= ($highestBid->bid_amount ?? 0) || $request->bid_amount > $regularPrice) {
        //     return redirect()->back()->withErrors(['bid_amount' => 'Bid amount must be higher than the starting price, higher than the current highest bid, and less than or equal to the regular price.']);
        // }

        if ($bidAmount < $startingPrice) {
            return redirect()->back()->withErrors(['bid_amount' => 'Bid amount must be higher than or equal to the starting price.']);
        }

        if ($bidAmount <= ($highestBid->bid_amount ?? 0)) { // Null Coalescing Operator 
            return redirect()->back()->withErrors(['bid_amount' => 'Bid amount must be higher than the current highest bid.']);
        }

        if ($bidAmount > $regularPrice) {
            return redirect()->back()->withErrors(['bid_amount' => 'Bid amount must be less than or equal to the regular price.']);
        }


        $bid = new Bid();
        $bid->product_id = $productId;
        $bid->user_id = Auth::id();
        $bid->bid_amount = $request->bid_amount;
        $bid->save();

        return redirect()->route('user.bids.show', $productId)->with('success', 'Bid placed successfully!');
    }

    public function update(Request $request, $bidId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:1',
        ]);

        $bid = Bid::findOrFail($bidId);
        $product = $bid->product;
        $highestBid = Bid::where('product_id', $product->id)->orderBy('bid_amount', 'desc')->first();
        $regularPrice = $product->regular_price;
        $startingPrice = $product->starting_price;

        if ($request->bid_amount < $startingPrice || $request->bid_amount <= ($highestBid->bid_amount ?? 0) || $request->bid_amount > $regularPrice) {
            return redirect()->back()->withErrors(['bid_amount' => 'Bid amount must be higher than the starting price, higher than the current highest bid, and less than or equal to the regular price.'])->withInput();
        }

        $bid->bid_amount = $request->bid_amount;
        $bid->save();

        return redirect()->route('user.bids.show', $product->id)->with('success', 'Bid updated successfully!');
    }

    public function destroy($bidId)
    {
        $bid = Bid::findOrFail($bidId);
        $bid->delete();

        return redirect()->back()->with('success', 'Bid deleted successfully!');
    }
}
