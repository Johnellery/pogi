<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\email;
use App\Mail\cancelled;
use App\Models\User;
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

            $doctor = User::findOrFail($appointment->doctor_user_id);

            $mailData = [
                'title' => 'A.M. Santos Dental Clinic - Appointment Status',
                'body' => 'Dear, '. $first,
                'appointment' => $appointment,
                'doctor' => $doctor,
            ];

            Mail::to($email)->send(new email($mailData));
            return redirect('/admin/appointments');
        } else {
            dd('User not found for the given Appointment.');
        }
    }
    public function cancelled(Appointment $record)
    {
        $appointment = $record;
        $first = $appointment->first;
        $last = $appointment->last;
        $middle = $appointment->middle;

        $appointment->update(['status' => 'cancelled', 'finished' => 'cancelled']);

        if ($appointment->user) {
            $email = $appointment->user->email;

            $doctor = User::findOrFail($appointment->doctor_user_id);

            $mailData = [
                'title' => 'A.M. Santos Dental Clinic - Appointment Status',
                'body' => 'Dear, '. $first,
                'appointment' => $appointment,
                'doctor' => $doctor,
            ];

            Mail::to($email)->send(new cancelled($mailData));
            return redirect('/admin/appointments');
        } else {
            dd('User not found for the given Appointment.');
        }
    }
}
