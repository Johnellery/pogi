<?php

namespace App\Filament\Resources\AvailableResource\Pages;

use App\Filament\Resources\AvailableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAvailable extends CreateRecord
{
    protected static string $resource = AvailableResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Availability Created';
    }
}
