<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function showLoginForm() {
        return view( 'user_login' );
    }

    public function userSubmit( Request $request ) {
        $request->validate( array(
            'username' => 'required|string',
            'password' => 'required|string',
        ), array(
            'username.required' => "Name must be filled up!",
            'password.required' => "Password filled must be required!",
        ) );

        // dd( $request->all() );
        // Attempt to log in using username and password
        if ( Auth::attempt( array( 'username' => $request->username, 'password' => $request->password ) ) ) {
            $request->session()->regenerate();
            return redirect()->intended( 'home' );
        }

        return back()->withErrors( array(
            'username' => 'The provided credentials do not match our records.',
        ) );

    }

    public function logout( Request $request ) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect( '/user-login' );
    }
}