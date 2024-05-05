<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Support\Carbon;

class Services extends BaseWidget
{
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
        ->query(function () {
            $query = Service::query();
            $user = Auth::user();

            if ($user->role->name === 'Patient') {
                $query->where('category_id', '1');
            }
            return $query;
        })
        ->defaultPaginationPageOption(5)
        ->defaultSort('name', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->label('Name'),
                Tables\Columns\TextColumn::make('price')
                ->searchable()
                ->sortable()
                ->getStateUsing(function (Service $record) {
                    $price = number_format($record->price, 0, ',', ',');
                    return $price . ' PHP';
                }),
            ]);
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Patient';
    }
}
