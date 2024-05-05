<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Infolists\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $activeNavigationIcon = 'heroicon-s-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Username')
                    ->placeholder('Enter your Username')
                    ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique()
                    ->required()
                    ->placeholder('Enter the Email address')
                    ->maxLength(255),
                    Forms\Components\Select::make('role_id')
                    ->options(function () {
                        return Role::whereIn('id', [2, 3, 4, 5])->pluck('name', 'id');
                    })
                    ->label('Role')
                    ->native(false)
                    ->required()
                    ->preload(),
                    Forms\Components\TextInput::make('password')
                    ->password()
                    ->rule(Password::default()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised(3)
                    )
                    ->same('passwordConfirmation')
                    ->placeholder('Enter your password')
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->revealable()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('passwordConfirmation')
                    ->password()
                    ->required()
                    ->revealable()
                    ->placeholder('Confirm your password')
                    ->maxLength(255),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('User name')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->copyable()
                ->copyMessage('Email address copied')
                ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('role.name')
                ->Badge(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
                ->label('Archive Record')
                ->native(false)
                ->trueLabel(' With Archive Record')
                ->falseLabel('Archive Record Only')
                ->placeholder('All')
                ->default(null),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                    ->color('primary'),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->label('Archive')
                    ->successNotification(
                        Notification::make()
                             ->success()
                             ->title('User Archive')
                             ->body('The user has been Archived successfully.')),
                ])
                ->button()
                ->color('warning')
                ->label('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->label('Archive'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Service information')
                ->description('details of service.')
                ->schema([
                    Infolists\Components\Grid::make(1)->schema([
                        Infolists\Components\Grid::make(3)->schema([
                            Infolists\Components\Section::make('')
                                ->schema([
                                    Infolists\Components\Grid::make(3)->schema([
                                        Infolists\Components\TextEntry::make('name')
                                            ->label('Username'),
                                        Infolists\Components\TextEntry::make('email')
                                            ->label('Email address'),
                                        Infolists\Components\TextEntry::make('role.name')
                                            ->label('Role')
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
        ]);
    }
}
