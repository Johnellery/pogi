<?php

namespace App\Filament\Resources\AvailableResource\Pages;

use App\Filament\Resources\AvailableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvailable extends EditRecord
{
    protected static string $resource = AvailableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Availability Updated';
    }
}
