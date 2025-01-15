    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\VerificationController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\RegisteredUsersController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\HomeController;

    // Admin Controller
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AdminCategoryController;
    use App\Http\Controllers\AdminProductController;
    use App\Http\Controllers\BidController;
    use App\Http\Controllers\AdminBidController;
    // User Controller
    use App\Http\Controllers\UserBidController;
    use App\Http\Controllers\UserController;



    // ____________  ... By Default ... _______________
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes(['verify' => true]);

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin routes
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

        //categories
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

        //products
        Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

        // Bid Controller
        Route::get('/bids', [BidController::class, 'index'])->name('admin.bids.index');
        Route::post('/bids/{id}/place', [BidController::class, 'placeBid'])->name('admin.bids.place');
        Route::put('/bids/{id}/update-status', [BidController::class, 'updateBidStatus'])->name('admin.updateBidStatus');
        Route::post('/bids/{id}/confirm', [BidController::class, 'confirmBid'])->name('bids.confirm');

    });

    // User routes
    Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('profile', [UserController::class, 'show'])->name('user.profile.show');
        Route::put('profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
        Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

        Route::get('/user/bids/{productId}', [UserBidController::class, 'show'])->name('user.bids.show');
        Route::post('/user/bids/{productId}', [UserBidController::class, 'store'])->name('user.bids.store');
        Route::put('/user/bids/{bidId}', [UserBidController::class, 'update'])->name('user.bids.update');
        Route::delete('/user/bids/{bidId}', [UserBidController::class, 'destroy'])->name('user.bids.destroy');
        Route::get('/bids/{id}', [UserBidController::class, 'show'])->name('users.bids.show');
    });

    // Logout Route
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //  ________________... SEND EMAIL VARIFICATI ROUTE ... ___________________

    // Test email sending route (for debugging purposes)
    Route::get('/test-email', function () {
        $user = \App\Models\User::first(); // Replace with an actual user ID
        $product = \App\Models\Product::first(); // Replace with an actual product ID
        $bid = Bid::where('user_id', $user->id)->where('product_id', $product->id)->first();

        // Log email content
        Log::info('Email Content:', [
            'subject' => 'Congratulations! You are the highest bidder',
            'view' => view('emails.bid_winner_notification', compact('bid', 'product'))->render(),
        ]);

        Mail::to($user->email)->send(new BidWinnerNotification($bid, $product));

        return 'Email sent!';
    });



