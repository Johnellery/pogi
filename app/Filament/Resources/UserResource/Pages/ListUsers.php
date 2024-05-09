<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new User'),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Doctor' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('role_id', '2')),
            'Dentist' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('role_id', '4')),
            'Patient' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('role_id', '5')),
        ];
    }
}
