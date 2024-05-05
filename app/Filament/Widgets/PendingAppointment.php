<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class PendingAppointment extends BaseWidget
{
    protected static ?int $sort = 5;
    public function table(Table $table): Table
    {
        return $table
        ->query(function () {
            $query = Appointment::query();
            $user = Auth::user();

            if ($user->role->name === 'Admin'  || $user->role->name === 'Staff') {
                $query->where('status', 'pending');
            } elseif ($user->role->name === 'Doctor' || $user->role->name === 'Dentist') {
                $query->where('doctor_user_id', $user->id)
                      ->where('status', 'pending');
            }
            return $query;
        })
        ->defaultPaginationPageOption(5)
        ->defaultSort('date', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                ->searchable()
                ->sortable()
                ->label('Applicant name')
                ->getStateUsing(function (Appointment $record) {
                    return "{$record->last}, {$record->first} {$record->middle}";
                })
                // ->getStateUsing(function (Applicant $record) {
                //     return $record->updateCompute();
                // })
                // ->description(function (Applicant $record) {
                //     return $record->updateremaining();
                // })
                ->searchable(),
                Tables\Columns\TextColumn::make('date')
                ->label('Appointment Date')
                ->sortable()
                ->getStateUsing(function (Appointment $record) {
                    return Carbon::parse($record->date)->format('F j, Y');
                }),
                Tables\Columns\TextColumn::make('status')
                    ->Badge()
                    ->getStateUsing(function (Appointment $record): string {
                        if ($record->isApproved()) {
                            return 'Approved';
                        } elseif ($record->isCancelled()) {
                            return 'Cancelled';
                        } else {
                            return 'Pending';
                        }
                    })
                    ->colors([
                        'success' => 'Approved',
                        'danger' => 'Cancelled',
                        'warning' => 'Pending'
                    ])
            ]);
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Admin'  || $user->role->name === 'Staff' || $user->role->name === 'Doctor' || $user->role->name === 'Dentist';
    }
}
