<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ResetPasswordEmail;

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

    public function resetPassword(Request $request)
    {
        $email = $request->input('reset-password-email');
        $user = User::where('email', $email)->first();
        if(!$user) {
            session()->flash('error', 'Email không tồn tại trong hệ thống.');
            return redirect()->back();
        }
        $newPassword = Str::random(6);
        $hashPassword = Hash::make($newPassword);
        $user->update(['password' => $hashPassword]);

        Mail::to($email)->send(new ResetPasswordEmail($user->name, $newPassword));
        session()->flash('status', 'Mật khẩu mới đã được gửi vào email của bạn.');
        return redirect()->route('page.login');
    }
}
