<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Logout Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for Logout and delete Session
    |
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/welcome');
    }
}
