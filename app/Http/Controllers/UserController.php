<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function userDashboard(){

        return view('user.user_index');
    }

    public function userLogin(){
        return view('user.user_login');
    }

    public function userLogout(Request $request): RedirectResponse{
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
