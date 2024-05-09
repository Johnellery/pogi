<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnounceResource\Pages;
use App\Filament\Resources\AnnounceResource\RelationManagers;
use App\Models\Announce;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class AnnounceResource extends Resource
{
    protected static ?string $model = Announce::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $activeNavigationIcon = 'heroicon-s-megaphone';
    protected static ?int $navigationSort = 19;
    protected static ?string $navigationGroup = 'Patient';
    public static function shouldRegisterNavigation(): bool
    {
        $userole = Auth::user();
        $user = $userole->role->name;
        return $user && $user=== 'Staff' || $user && $user=== 'Admin';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->placeholder('Enter your Title'),
                    Forms\Components\DatePicker::make('date')
                    ->placeholder('MM/DD/YYYY')
                    ->label('Date')
                    ->native(false)
                    ->afterStateUpdated(function ($set, $get) {
                        $date = $get('date');
                        $formattedDate = Carbon::parse($date)->format('F j, Y');
                        $set('formatted', $formattedDate);
                    }),
                    Forms\Components\Hidden::make('formatted')
                    ->reactive(),
                    Forms\Components\TextInput::make('announcement')
                    ->required()
                    ->columnSpan(span:2)
                    ->label('Announcement')
                    ->placeholder('Enter your Announcement')

                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Title'),
                Tables\Columns\TextColumn::make('announcement')
                ->label('Announcement'),
                Tables\Columns\TextColumn::make('date')
                ->label('Appointment Date')
                ->sortable()
                ->getStateUsing(function (Announce $record) {
                    return Carbon::parse($record->date)->format('F j, Y');
                }),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
                ->label('Archive Record')
                ->native(false)
                ->visible(function () {
                    $user = Auth::user();
                    return $user->role->name === 'Staff' || $user->role->name === 'Admin';
                })
                ->trueLabel(' With Archive Record')
                ->falseLabel('Archive Record Only')
                ->placeholder('All')
                ->default(null),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                    ->color('primary'),
                    Tables\Actions\EditAction::make()
                    ->color('warning'),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->label('Archive')
                ])
                ->button()
                ->color('warning')
                ->label('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnounces::route('/'),
            'create' => Pages\CreateAnnounce::route('/create'),
            'edit' => Pages\EditAnnounce::route('/{record}/edit'),
        ];
    }
}
