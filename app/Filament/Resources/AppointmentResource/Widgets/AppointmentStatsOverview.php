<?php

namespace App\Filament\Resources\AppointmentResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class AppointmentStatsOverview extends BaseWidget
{
    public ?Model $record = null;
    protected function getStats(): array
    {
        $user = Auth::user();
        $currentDates = Carbon::today();
        $todayAppointmentsCount = Appointment::
            where('status', 'approved')
            ->where('date', '=', $currentDates->toDateString())
            ->count();

        $total = Appointment::whereDate('date', '>=', $currentDates)
        ->where('status', 'approved')
        ->count();
        $pending = Appointment::where('status', 'pending')
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
        return $user->role->name === 'Admin' || $user->role->name === 'Staff';
    }
    protected function getcolumns(): int
    {
        return 3;
    }

}
