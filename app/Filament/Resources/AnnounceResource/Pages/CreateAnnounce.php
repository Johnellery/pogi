<?php

namespace App\Filament\Resources\AnnounceResource\Pages;

use App\Filament\Resources\AnnounceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnounce extends CreateRecord
{
    protected static string $resource = AnnounceResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Announcement Created';
    }
}
