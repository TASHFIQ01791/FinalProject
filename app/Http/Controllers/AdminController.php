<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Bid;
use App\Models\User;

class AdminController extends Controller
{
    // Method to list all users with search and pagination
    public function index(Request $request)
    {
        $query = User::query();

        // Check if a search term is provided
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        }

        // Paginate the results
        $users = $query->paginate(5);

        // Pass the search term to the view for the search form value
        return view('admin.userList.users', compact('users', 'search'));
    }

    // Method to show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.userList.edit_users', compact('user'));
    }

    // Method to update user information
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Method to delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    // User Dashboard
    public function dashboard()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalBids = Bid::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalCategories', 'totalProducts', 'totalBids', 'totalUsers'));
    }
}
