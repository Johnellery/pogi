<?php

namespace App\Filament\Resources\AdminAvailableResource\Pages;

use App\Filament\Resources\AdminAvailableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdminAvailable extends CreateRecord
{
    protected static string $resource = AdminAvailableResource::class;
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
