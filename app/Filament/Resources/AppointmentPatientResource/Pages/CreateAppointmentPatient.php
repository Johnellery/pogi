<?php

namespace App\Filament\Resources\AppointmentPatientResource\Pages;

use App\Filament\Resources\AppointmentPatientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointmentPatient extends CreateRecord
{
    protected static string $resource = AppointmentPatientResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Appointment Created';
    }
}
