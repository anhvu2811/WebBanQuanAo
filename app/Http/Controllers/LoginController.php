<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(!$email) {
            return back()->withErrors(['errors' => 'Email cannot be empty'])->withInput();
        }
        if(!$password) {
            return back()->withErrors(['errors' => 'Password cannot be empty'])->withInput();
        }

        $hashPassword = Hash::make($password);
        $user = User::where('email', $email)->first();
        if(!$user || !Hash::check($password, $user->password)) {
           return back()->withErrors(['errors' => 'Invalid username/password'])->withInput();
        }

        session(['user' => $user]);
        return redirect()->route('page.index');
    }

    public function logout(Request $request)
    {
        $request->session('user')->flush();
        return redirect()->route('page.index');    
    }


}
