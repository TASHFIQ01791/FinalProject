<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\User;

class UserController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user();

        // Fetch bids and count them
        $bids = Bid::where('user_id', $user->id)->with('product')->get();
        $bidCount = $bids->count();

        // Extract products from the bids
        $products = $bids->pluck('product');

        // Pass user, bid count, and products to the view
        return view('users.dashboard', compact('user', 'bidCount', 'products'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('user.profile.show')->with('success', 'Profile updated successfully.');
    }

    // New methods for admin to manage users
    public function index()
    {
        $users = User::paginate(5);  // Fetch and paginate users with 10 per page
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
