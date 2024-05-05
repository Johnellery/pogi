<?php

namespace App\Filament\Resources\AppointmentPatientResource\Pages;

use App\Filament\Resources\AppointmentPatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class ListAppointmentPatients extends ListRecords
{
    protected static string $resource = AppointmentPatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new Appointment')
            ->visible(function () {
                $user = Auth::user();
                return $user->role->name === 'Patient' ;
            })
            // ->hidden(function () {
            //     $creationsToday = Appointment::whereDate('created_at', today());
            //     return $creationsToday;
            // }),
        ];
    }
}
