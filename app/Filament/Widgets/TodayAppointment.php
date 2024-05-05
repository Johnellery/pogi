<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class TodayAppointment extends BaseWidget
{
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
        ->query(function () {
            $query = Appointment::query();
            $user = Auth::user();
            $currentDate = Carbon::now();

            if ($user->role->name === 'Admin'  || $user->role->name === 'Staff') {
                $query->where('status', 'approved')
                      ->whereDate('date', $currentDate);
            } elseif ($user->role->name === 'Doctor' || $user->role->name === 'Dentist') {
                $query->where('doctor_user_id', $user->id)
                      ->where('status', 'approved')
                      ->whereDate('date', $currentDate);
            }
            return $query;
        })
        ->defaultPaginationPageOption(5)
        ->defaultSort('time', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                ->searchable()
                ->sortable()
                ->label('Applicant name')
                ->getStateUsing(function (Appointment $record) {
                    return "{$record->last}, {$record->first} {$record->middle}";
                }),
                Tables\Columns\TextColumn::make('time')
                ->label('Appointment Time')
                ->sortable()
                ->getStateUsing(function (Appointment $record) {
                    return Carbon::parse($record->time)->format('g:i A');
                }),
            ]);
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Admin'  || $user->role->name === 'Staff' || $user->role->name === 'Doctor' || $user->role->name === 'Dentist';
    }
}
