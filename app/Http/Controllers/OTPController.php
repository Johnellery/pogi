<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Mail\OTPNotification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OTPController extends Controller
{
    public function otp($userId)
    {
        $user = User::findOrFail($userId);
        $first = $user->first;

        if ($user) {
            $email = $user->email;

            $mailData = [
                'title' => 'A.M. Santos Dental Clinic - OTP Code',
                'body' => 'Dear, '. $first,
                'user' => $user,
            ];

            Mail::to($email)->send(new OTPNotification($mailData));
            return view('otp', compact('userId'));
        } else {
            dd('Error.');
        }
    }
    public function verify(Request $request, $userId)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $otpEntered = $request->input('otp');
        $user = User::findOrFail($userId);
        $userOTP = $user->otp;

        if ($otpEntered == $userOTP) {
            $request->session()->flash('success', 'OTP verified successfully.');

            $user->update(['email_verified_at' => Carbon::now()]);

            return redirect()->to('http://127.0.0.1:8000/admin');
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }
    public function resend($userId)
    {
        $user = User::findOrFail($userId);
        $first = $user->first;

        if ($user) {
            $email = $user->email;

            $otp = mt_rand(100000, 999999);
            $expired = Carbon::now()->addMinutes(5)->toDateTimeString();
            $user->update([
                'otp' => $otp,
                'expired' => $expired,
            ]);
            $mailData = [
                'title' => 'A.M. Santos Dental Clinic - OTP Code',
                'body' => 'Dear, '. $first . '. Your new OTP is: ' . $otp,
                'user' => $user,
            ];

            Mail::to($email)->send(new OTPNotification($mailData));

            return redirect()->back()->with('success', 'New OTP has been sent.');
        } else {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }
    }
}
