<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new Service'),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Service' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category_id', '1')),
            'Partial Denture (Anterior or Posterior only)' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category_id', '2')),
            'Partial Denture (Anterior or Posterior)Upper only' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category_id', '3')),
            'Complete Denture (Upper only)' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category_id', '4')),
            'Veneer' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category_id', '5')),
        ];
    }
}
