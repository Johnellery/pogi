<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminAvailableResource\Pages;
use App\Filament\Resources\AdminAvailableResource\RelationManagers;
use App\Models\Available;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Infolists\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Wizard;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class AdminAvailableResource extends Resource
{
    protected static ?string $model = Available::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $activeNavigationIcon = 'heroicon-s-calendar';
    protected static ?int $navigationSort = 16;
    protected static ?string $navigationGroup = 'Patient';

    public static function getLabel(): string
    {
        return 'Availability';
    }
    public static function shouldRegisterNavigation(): bool
    {
        $userole = Auth::user();
        $user = $userole->role->name;
        return $user && $user=== 'Staff' || $user && $user=== 'Admin';
    }
    public static function form(Form $form): Form
    {
        $user = Auth::user();
        return $form
            ->schema([
                Forms\Components\Section::make([
                Forms\Components\Select::make('user_id')
                ->relationship('User', 'name')
                ->label('Select your Doctor/Dentist')
                ->options(function () {
                    return \App\Models\User::whereIn('role_id', [2, 4])
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->pluck(\DB::raw("CONCAT(users.name, ' - ', roles.name) AS user_role"), 'users.id');
                })
                ->visible(function () {
                    $user = Auth::user();
                    return $user->role->name === 'Staff' || $user->role->name === 'Admin';
                })
                ->native(false)
                ->required(),
                Forms\Components\DatePicker::make('date')
                ->placeholder('MM/DD/YYYY')
                ->label('Appointment Date')
                ->disabledDates(function () {
                    $disabledDates = [];
                    $today1 = Carbon::today();
                    $today =$today1->copy()->addDay();
                    $start = $today->copy()->startOfYear();
                    $end = $today->copy()->endOfYear();
                    for ($date = $start; $date->lte($end); $date->addDay()) {
                        if ($date->isSunday() || $date->lt($today)) {
                            $disabledDates[] = $date->format('Y-m-d');
                        }
                    }
                    return $disabledDates;
                })
                ->native(false),
                TextInput::make('note')
                ->placeholder('Enter your notes')
                ->label('Add notes'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->searchable()
                ->sortable()
                ->label('Doctor/Dentist name'),
                Tables\Columns\TextColumn::make('date')
                ->label('Appointment Date')
                ->sortable()
                ->getStateUsing(function (Available $record) {
                    return Carbon::parse($record->date)->format('F j, Y');
                }),
                Tables\Columns\TextColumn::make('note')
                ->label('Notes'),
            ])
            ->filters([
                Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                        );
                }),
                Tables\Filters\TrashedFilter::make()
                ->label('Archive Record')
                ->native(false)
                // ->visible(function () {
                //     $user = Auth::user();
                //     return $user->role->name === 'Staff' || $user->role->name === 'Admin';
                // })
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
    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        $query = parent::getEloquentQuery();

        if ($user->role->name === 'Admin' || $user->role->name === 'Staff') {
            return $query->withoutGlobalScopes([SoftDeletingScope::class]);
        } elseif ($user->role->name === 'Doctor'  || $user->role->name === 'Dentist') {
            return $query->where('user_id', $user->id)
                ->withoutGlobalScopes([SoftDeletingScope::class]);
        }
        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdminAvailables::route('/'),
            'create' => Pages\CreateAdminAvailable::route('/create'),
            'edit' => Pages\EditAdminAvailable::route('/{record}/edit'),
        ];
    }
}
