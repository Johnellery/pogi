<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\Role;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'Patient';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\FileUpload::make('picture')
                    ->image()
                    ->preserveFilenames()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->imageEditorEmptyFillColor('#000000')
                    ->imageEditorMode(2)
                    ->columnSpan(span:2),
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpan(span:2)
                    ->label('Service name')
                    ->placeholder('Enter your Service Name')
                    ->dehydrateStateUsing(fn (string $state): string => ucwords($state)),
                    Forms\Components\Select::make('category_id')
                    ->relationship('Category', 'name')
                    ->label('Category')
                    ->native(false)
                    ->required()
                    ->preload(),
                    Forms\Components\TextInput::make('price')
                    ->placeholder('Enter the Price')
                    ->prefix('Php')
                    ->label('Price')
                    ->rule('numeric'),
                    Forms\Components\TextInput::make('regular')
                    ->placeholder('Enter the Regular Acrylic Frame Price')
                    ->prefix('Php')
                    ->label('Regular Acrylic Frame')
                    ->rule('numeric'),
                    Forms\Components\TextInput::make('vertex')
                    ->placeholder('Enter the Vertex Frame Price')
                    ->prefix('Php')
                    ->label('Vertex Frame')
                    ->rule('numeric'),
                    Forms\Components\TextInput::make('flexible')
                    ->placeholder('Enter the Flexible Price')
                    ->prefix('Php')
                    ->label('Flexible')
                    ->rule('numeric'),
                    Forms\Components\Select::make('role_id')
                    ->native(false)
                    ->multiple()
                    ->label('Role')
                    ->required()
                    ->preload()
                    ->options(function () {
                        return Role::whereIn('id', [2, 4])->pluck('name', 'id');
                    }),
                    // Forms\Components\TextInput::make('description')
                    // ->required()
                    // ->columnSpan(span:2)
                    // ->label('Description')
                    // ->placeholder('Enter your Description'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\ImageColumn::make('picture')
                ->circular(),
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('price')
                ->sortable()
                ->numeric(
                    decimalPlaces: 0,
                    decimalSeparator: '.',
                    thousandsSeparator: ',',
                )
                ->getStateUsing(function (Service $record) {
                    $regular = $record->price;
                    if (empty($regular)) {
                        return 'N/A';
                    } else {
                        return $regular;
                    }
                }),
                Tables\Columns\TextColumn::make('regular')
                ->sortable()
                ->label('Regular Acrylic Frame')
                ->numeric(
                    decimalPlaces: 2,
                    decimalSeparator: '.',
                    thousandsSeparator: ',',
                )
                ->getStateUsing(function (Service $record) {
                    $regular = $record->regular;
                    if (empty($regular)) {
                        return 'N/A';
                    } else {
                        return $regular;
                    }
                }),
                Tables\Columns\TextColumn::make('vertex')
                ->sortable()
                ->label('Vertex Frame')
                ->numeric(
                    decimalPlaces: 2,
                    decimalSeparator: '.',
                    thousandsSeparator: ',',
                )
                ->getStateUsing(function (Service $record) {
                    $regular = $record->vertex;
                    if (empty($regular)) {
                        return 'N/A';
                    } else {
                        return $regular;
                    }
                }),
                Tables\Columns\TextColumn::make('flexible')
                ->sortable()
                ->label('Flexible')
                ->numeric(
                    decimalPlaces: 2,
                    decimalSeparator: '.',
                    thousandsSeparator: ',',
                )
                ->getStateUsing(function (Service $record) {
                    $regular = $record->flexible;
                    if (empty($regular)) {
                        return 'N/A';
                    } else {
                        return $regular;
                    }
                }),
                Tables\Columns\TextColumn::make('role_id')
                ->searchable()
                ->label('Role')
                ->visible(function () {
                    $user = Auth::user();
                    return $user->role->name === 'Staff' || $user->role->name === 'Admin';
                })
                ->Badge()
                ->getStateUsing(function (Service $record) {
                    $roleMapping = [
                        1 => 'Admin',
                        2 => 'Doctor',
                        3 => 'Staff',
                        4 => 'Dentist',
                        5 => 'Patient',
                    ];
                    $roleIds = $record->role_id;
                    if ($roleIds === null) {
                        return 'None';
                    }
                    $roleNames = [];
                    foreach ($roleIds as $roleId) {
                        if (isset($roleMapping[$roleId])) {
                            $roleNames[] = $roleMapping[$roleId];
                        }
                    }
                    return implode(', ', $roleNames);
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
                    ->successNotification(
                        Notification::make()
                             ->success()
                             ->title('Service Archive')
                             ->body('The user has been Archived successfully.')),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
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
                            Infolists\Components\Section::make('') // Section needs to be specified
                                ->schema([
                                    Infolists\Components\Grid::make(3)->schema([
                                        Infolists\Components\TextEntry::make('name')
                                            ->label('Service name'),
                                        Infolists\Components\TextEntry::make('category.name')
                                            ->label('Category'),
                                        Infolists\Components\TextEntry::make('price')
                                            ->label('Price')
                                            ->getStateUsing(function (Service $record) {
                                                $regular = $record->price;
                                                if (empty($regular)) {
                                                    return 'N/A';
                                                } else {
                                                    return $regular;
                                                }
                                            }),
                                        Infolists\Components\TextEntry::make('regular')
                                            ->label('Regular Acrylic Frame')
                                            ->getStateUsing(function (Service $record) {
                                                $regular = $record->regular;
                                                if (empty($regular)) {
                                                    return 'N/A';
                                                } else {
                                                    return $regular;
                                                }
                                            }),
                                        Infolists\Components\TextEntry::make('vertex')
                                            ->label('Vertex Frame')
                                            ->getStateUsing(function (Service $record) {
                                                $regular = $record->vertex;
                                                if (empty($regular)) {
                                                    return 'N/A';
                                                } else {
                                                    return $regular;
                                                }
                                            }),
                                        Infolists\Components\TextEntry::make('flexible')
                                            ->label('Flexible')
                                            ->getStateUsing(function (Service $record) {
                                                $regular = $record->Flexible;
                                                if (empty($regular)) {
                                                    return 'N/A';
                                                } else {
                                                    return $regular;
                                                }
                                            }),
                                        Infolists\Components\TextEntry::make('role.name')
                                            ->badge()
                                            ->label('Role')
                                            ->visible(function () {
                                                $user = Auth::user();
                                                return $user->role->name === 'Staff' || $user->role->name === 'Admin';
                                            })
                                            ->getStateUsing(function (Service $record) {
                                                $roleMapping = [
                                                    1 => 'Admin',
                                                    2 => 'Doctor',
                                                    3 => 'Staff',
                                                    4 => 'Dentist',
                                                    5 => 'Patient',
                                                ];
                                                $roleIds = $record->role_id;
                                                if ($roleIds === null) {
                                                    return 'None';
                                                }
                                                $roleNames = [];
                                                foreach ($roleIds as $roleId) {
                                                    if (isset($roleMapping[$roleId])) {
                                                        $roleNames[] = $roleMapping[$roleId];
                                                    }
                                                }
                                                return implode(', ', $roleNames);
                                            }),
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
        ]);
    }

}
