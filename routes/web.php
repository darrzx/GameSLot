<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ALL USER
// Go to home
Route::get('/', [GameController::class, 'showHomePage']);
// Game Detail
Route::get('/gameDetail/{id}', [GameController::class, 'showGameDetail']);
// Search Game
Route::post('/searchGame', [GameController::class, 'searchGame']);
// User signout
Route::get('/signOut', [UserController::class, 'signout']);
// Add To Cart
Route::get('/addToCart/{id}', [CartController::class, 'addToCart']);


// GUEST
Route::group(['middleware' => 'guest'], function(){
    // Go login page
    Route::get('/signIn', [UserController::class, 'showLoginPage']);
    // User login
    Route::post('/signIn', [UserController::class, 'signin']);
    // Go register page
    Route::get('/signUp', [UserController::class, 'showRegisterPage']);
    // User register
    Route::post('/signUp', [UserController::class, 'signup']);
});

// ADMIN
Route::group(['middleware' => 'admin'], function(){
    // Go manage game page
    Route::get('/manageGame', [GameController::class, 'showManageGamePage']);
    // Go manage game genre page
    Route::get('/manageGameGenre', [GameController::class, 'showManageGameGenrePage']);
    // Delete game
    Route::get('/deleteGame/{id}', [GameController::class, 'deleteGame']);
    // Go update game page
    Route::get('/updateGame/{id}', [GameController::class, 'showUpdateGamePage']);
    // Update game
    Route::post('/updateGame/{id}', [GameController::class, 'updateGame']);
    // Go add game page
    Route::get('/addGame', [GameController::class, 'showAddGamePage']);
    // Add game
    Route::post('/addGame', [GameController::class, 'addGame']);
    // Go update game genre page
    Route::get('/updateGameGenre/{id}', [GameController::class, 'showUpdateGameGenrePage']);
    // Update game genre
    Route::post('/updateGameGenre/{id}', [GameController::class, 'updateGameGenre']);
});


// LOGGED IN USER
Route::group(['middleware' => 'auth'], function(){
    // Go login page
    Route::get('/cart', [CartController::class, 'showCartPage']);
    // Update cart
    Route::post('/updateCart/{id}', [CartController::class, 'updateCart']);
    // Delete cart
    Route::post('/deleteCart/{id}', [CartController::class, 'deleteCart']);
    // Checkout
    Route::post('/checkout', [CartController::class, 'checkout']);
    // Go profile page
    Route::get('/profile', [UserController::class, 'showProfilePage']);
    // Update user
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Update account user
    Route::post('/updateAccountUser/{id}', [UserController::class, 'updateAccountUser']);
    // Go transaction header page
    Route::get('/transactionheader', [TransactionController::class, 'showTransactionHeaderPage']);
    // Go transaction detail page
    Route::get('/transactiondetail/{id}', [TransactionController::class, 'showTransactionDetailPage']);
});


