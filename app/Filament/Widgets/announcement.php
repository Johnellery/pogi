<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Announce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\TextInput;
class announcement extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
        ->query(function () {
            $query = Announce::query();
            $user = Auth::user();
            $currentDate = Carbon::now();

            $query->whereDate('date', '>', $currentDate->subDay());
            return $query;
        })
        ->defaultPaginationPageOption(5)
        ->defaultSort('date', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label(''),
                Tables\Columns\TextColumn::make('announcement')
                ->label(''),
                Tables\Columns\TextColumn::make('formatted')
                ->label(''),

                ])
            ->actions([
                    Tables\Actions\ViewAction::make()
                    ->color('primary')
                    ->form([
                        TextInput::make('title')
                        ->label('Title'),
                        TextInput::make('formatted')
                        ->label('Date'),
                        TextInput::make('announcement')
                        ->label('Announcement')
                    ]),
                ])
            ->emptyStateHeading('No Announcement yet');
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Patient';
    }

}
