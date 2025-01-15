<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

// Controller for home page
public function index(Request $request)
{
    $search = $request->query('search');

    $products = Product::where(function($query) use ($search) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    })
    ->where(function($query) {
        $query->where('bid_end_datetime', '>', now())
              ->orWhereNull('winner_id'); // Exclude products with confirmed bids or past end dates
    })
    ->paginate(6);

    return view('main', compact('products'));
}

}
