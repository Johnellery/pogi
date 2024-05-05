<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Support\Carbon;

class Complete extends BaseWidget
{
    protected static ?int $sort = 6;
    public function table(Table $table): Table
    {
        return $table
        ->query(function () {
            $query = Service::query();
            $user = Auth::user();

            if ($user->role->name === 'Patient') {
                $query->where('category_id', '4');
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
                Tables\Columns\TextColumn::make('regular')
                ->searchable()
                ->sortable()
                ->label('Regular Acrylic Frame')
                ->getStateUsing(function (Service $record) {
                    $price = number_format($record->regular, 0, ',', ',');
                    return $price . ' PHP';
                }),
                Tables\Columns\TextColumn::make('vertex')
                ->searchable()
                ->sortable()
                ->label('Vertex Frame')
                ->getStateUsing(function (Service $record) {
                    $price = number_format($record->vertex, 0, ',', ',');
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
