<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeEmail;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    //
    public function showLoginPage()
    {
        if (auth()->check()) {
            return redirect(route('admin'));
        }
        return view('admin.login');
    }

    public function showRegisterPage()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $findUser = User::where("email", $request->input("email"));

        if ($findUser->exists()) {
            return redirect(route('register'))->with('error', 'User already exists');
        }

        $user = User::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'user_id' => 'user_' . Str::random(10),
            'password' => Hash::make($request->password),
            'email_verification_token' => Str::random(64),
            'email_verified' => false,
            "remember_token" => Str::random(20),
            'avatar' => "/custom/placeholder.jpg"
        ]);

        $token = $user->remember_token;
        $token2 = $user->email_verification_token;

        Notification::create([
            'type' => 'account',
            'title' => 'New User Registration',
            'description' =>  $user->fullname . ' has registered on ' . GlobalSetting::first()->site_name,
            'seen' => 'unread',
            'image' => "custom/notifications/user.svg",
            'url' => '',
        ]);

        Notification::create([
            'type' => 'account',
            'title' => 'Welcome to ' . GlobalSetting::first()->site_name,
            'description' =>  $user->fullname . ' thanks for joining ' . GlobalSetting::first()->site_name,
            'seen' => 'unread',
            'user_id' => $user->id,
            'image' => "custom/notifications/user.svg",
            'url' => '',
        ]);

        $url = route('verify.email', $token2);
        Mail::send(new WelcomeEmail($user, $url));

        return redirect(route('validate.email', $token));
    }

    public function validateEmail($token)
    {
        $user = User::where("remember_token", $token)->first();

        if (!$user) {
            return redirect(route('home'));
        }
        return View::make("admin.validateemail", [
            'email' => $user->email
        ]);
    }

    public function verifyEmail($token)
    {

        $user = User::where("email_verification_token", $token)->first();
        $user->email_verified_at = now();
        $user->save();

        return redirect(route('login'))->with('success', 'Email Verified Successfully! Please login to continue.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect(route('login'))->with('error', 'Invalid Email Address or Password!');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect(route('login'))->with('error', 'Invalid Email Address or Password!');
        }

        if (!$user->email_verified_at) {
            return redirect(route('login'))->with('error', 'Email not verified');
        }

        auth()->login($user, true);
        return redirect(route('admin'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login'));
    }

    public function showForgotPasswordPage()
    {
        return view('admin.forgot');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect(route('forgot.password'))->with('error', 'Invalid Email Address!');
        }

        $code = rand(100000, 999999);
        session(['reset_code' => $code]);

        Mail::send(new ResetPassword($user, $code));
        return response()->json(['status' => 'success', 'message' => 'Reset code sent to your email']);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
            'password' => 'required|min:8'
        ]);

        $code = session('reset_code');

        if ($request->code != $code) {
            return redirect(route('forgot.password'))->with('error', 'Invalid reset code!');
        }

        $user = User::where("email", $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->with('success', 'Password reset successfully! Please login to continue.');

        return view('admin.reset');
    }
}
