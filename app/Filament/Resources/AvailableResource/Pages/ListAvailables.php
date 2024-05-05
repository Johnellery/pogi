<?php

namespace App\Filament\Resources\AvailableResource\Pages;

use App\Filament\Resources\AvailableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvailables extends ListRecords
{
    protected static string $resource = AvailableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new Availability'),
        ];
    }
}
