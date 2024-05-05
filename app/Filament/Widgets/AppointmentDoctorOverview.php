<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
class AppointmentDoctorOverview extends BaseWidget
{
    public ?Model $record = null;
    protected static ?int $sort = 3;
    protected function getStats(): array
    {
        $user = Auth::user();
        $currentDate = Carbon::now();
        $userId = $user->id;


        $todayAppointmentsCount = Appointment::whereDate('date', $currentDate)
        ->where('status', 'approved')
        ->where('doctor_user_id', $userId)
        ->count();
        $total = Appointment::whereDate('date', '>=', $currentDate)
        ->where('status', 'approved')
        ->where('doctor_user_id', $userId)
        ->count();
        $pending = Appointment::whereDate('date', '>=', $currentDate)
        ->where('doctor_user_id', $userId)
        ->where('status', 'pending')
        ->count();
        return [
            Stat::make('Total Appointment Today', $todayAppointmentsCount)
                ->description('Number of Approved Appointments today.')
                ->color('success'),
            Stat::make('Total Appointment', $total)
                ->description('Total of Approved Appointments.')
                ->color('primary'),
            Stat::make('Pending Appointment', $pending)
                ->description('Total of Pending Appointments.')
                ->color('warning'),
        ];
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Doctor' || $user->role->name === 'Dentist';
    }
    protected function getcolumns(): int
    {
        return 3;
    }
}
