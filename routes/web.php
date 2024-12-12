<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/dashboard', function () {
    return view( 'dashboard' );
} )->middleware( array( 'auth', 'verified' ) )->name( 'dashboard' );

Route::middleware( 'auth' )->group( function () {
    Route::get( '/profile', array( ProfileController::class, 'edit' ) )->name( 'profile.edit' );
    Route::patch( '/profile', array( ProfileController::class, 'update' ) )->name( 'profile.update' );
    Route::delete( '/profile', array( ProfileController::class, 'destroy' ) )->name( 'profile.destroy' );
} );

Route::get( '/seed-users', function () {
    DB::table( 'users' )->insert( array(
        'username' => 'adminuser2', // Add a username
        'name' => 'Admin2',
        'email'    => 'admin2@example.com',
        'password' => Hash::make( 'password' ), // Default password
    ) );
    return 'User created with username adminuser!';
} );

// Authentication routes
Route::get( '/user-login', array( AuthController::class, 'showLoginForm' ) )->name( 'userlogin.show' );
Route::post( '/user-login', array( AuthController::class, 'userSubmit' ) )->name( 'user.submit' );

Route::post( '/logout', array( AuthController::class, 'logout' ) )->name( 'logout' );

// Home route, protected by authentication
Route::middleware( 'isLoggedIn' )->get( '/home', function () {
    return view( 'home' );
} );

require __DIR__ . '/auth.php';
