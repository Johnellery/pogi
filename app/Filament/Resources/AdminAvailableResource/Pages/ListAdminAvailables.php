<?php

namespace App\Filament\Resources\AdminAvailableResource\Pages;

use App\Filament\Resources\AdminAvailableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminAvailables extends ListRecords
{
    protected static string $resource = AdminAvailableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new Availability'),
        ];
    }
}
