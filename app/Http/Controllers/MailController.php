<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\email;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function approved(Appointment $record)
    {
        $appointment = $record;
        $first = $appointment->first;
        $last = $appointment->last;
        $middle = $appointment->middle;

        $appointment->update(['status' => 'approved']);

        if ($appointment->user) {
            $email = $appointment->user->email;

            $mailData = [
                'title' => 'A.M. Santos Dental Clinic - appointment Status',
                'body' => 'Dear, '. $first,
            ];

            Mail::to($email)->send(new email($mailData));
            return redirect('/admin/appointments');
        } else {
            dd('User not found for the given Appointment.');
        }
    }
}
