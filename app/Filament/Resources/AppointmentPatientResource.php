<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentPatientResource\Pages;
use App\Filament\Resources\AppointmentPatientResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Available;
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
use Filament\Forms\Components\Wizard;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Philbrgy;
use App\Models\Philmuni;
use App\Models\Philprovince;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Filament\Resources\AppointmentResource\Widgets\AppointmentStatsOverview;
use App\Filament\Resources\AppointmentResource\Widgets;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Infolists\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class AppointmentPatientResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $activeNavigationIcon = 'heroicon-s-calendar-days';
    protected static ?int $navigationSort = 15;
    protected static ?string $navigationGroup = 'Patient';
    public static function getLabel(): string
    {
        return 'Appointment';
    }
    public static function shouldRegisterNavigation(): bool
    {
        $userole = Auth::user();
        $user = $userole->role->name;
        return $user && $user=== 'Patient';
    }
    public static function form(Form $form): Form
    {
        $user = Auth::user();
        return $form
            ->schema([
                Forms\Components\Section::make([
                                Forms\Components\Hidden::make('user_id')
                                ->default($user->id),
                                Forms\Components\Hidden::make('first')
                                ->default($user->first),
                                Forms\Components\Hidden::make('middle')
                                ->default($user->middle),
                                Forms\Components\Hidden::make('last')
                                ->default($user->last),
                                Forms\Components\Hidden::make('fullname')
                                ->default($user->fullname),
                                Forms\Components\Hidden::make('age')
                                ->default($user->age),
                                Forms\Components\Hidden::make('gender')
                                ->default($user->gender),
                                Forms\Components\Hidden::make('phone')
                                ->default($user->phone),
                                Forms\Components\Hidden::make('province')
                                ->default($user->province),
                                Forms\Components\Hidden::make('city')
                                ->default($user->city),
                                Forms\Components\Hidden::make('barangay')
                                ->default($user->barangay),
                                Forms\Components\Hidden::make('unit')
                                ->default($user->unit),
                                Forms\Components\Select::make('service_id')
                                ->relationship('Service', 'name')
                                ->label('Select your Service')
                                ->native(false)
                                ->reactive()
                                ->required()
                                ->preload(),
                                Forms\Components\Select::make('doctor_user_id')
                                ->reactive()
                                ->native(false)
                                ->label('Select your Doctor/Dentist')
                                ->options(function ($get) {
                                    $options = [];
                                    $serviceId = $get('service_id');
                                    $service = Service::find($serviceId);

                                    if (!$service) {
                                        return $options;
                                    }

                                    if ($serviceId = '"2","4"') {
                                        $users = User::whereIn('role_id', [2, 4])->get();
                                    } elseif ($serviceId = "2") {
                                        $users = User::where('role_id', 2)->get();
                                    } elseif ($serviceId = "4") {
                                        $users = User::where('role_id', 4)->get();
                                    } else {
                                        return $options;
                                    }

                                    foreach ($users as $user) {
                                        $options[$user->id] = $user->name;
                                    }

                                    return $options;
                                }),
                                Forms\Components\DatePicker::make('date')
                                ->placeholder('MM/DD/YYYY')
                                ->reactive()
                                ->label('Appointment Date')
                                ->disabledDates(function ($get) {
                                    $disabledDates = [];
                                    $today = Carbon::today()->addDay();
                                    $start = $today->copy()->startOfYear();
                                    $end = $today->copy()->endOfYear();
                                    $availableId = $get('doctor_user_id');

                                    $existingAppointments = Appointment::whereYear('date', $today->year)
                                        ->selectRaw('DATE(date) as date, COUNT(*) as count')
                                        ->groupBy('date')
                                        ->pluck('count', 'date')
                                        ->toArray();

                                    $unavailableDates = Available::where('user_id', $availableId)
                                        ->pluck('date')
                                        ->map(function ($date) {
                                            return Carbon::parse($date)->format('Y-m-d');
                                        })
                                        ->toArray();

                                    for ($currentDate = $start->copy(); $currentDate->lte($end); $currentDate->addDay()) {
                                        $carbonDate = Carbon::parse($currentDate);

                                        if ($carbonDate->isSunday() || $carbonDate->lt($today) || in_array($currentDate->format('Y-m-d'), $unavailableDates)) {
                                            $disabledDates[] = $currentDate->format('Y-m-d');
                                        }
                                        elseif (isset($existingAppointments[$currentDate->format('Y-m-d')]) && $existingAppointments[$currentDate->format('Y-m-d')] >= 30) {
                                            $disabledDates[] = $currentDate->format('Y-m-d');
                                        }
                                    }

                                    return $disabledDates;
                                })
                                ->native(false),
                                Forms\Components\TimePicker::make('time')
                                ->required()
                                ->hoursStep(2)
                                ->minutesStep(15)
                                ->seconds(false)
                                ->placeholder('--:--')
                                ->label('Appointment Time'),
                            ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultPaginationPageOption(5)
        ->defaultSort('date', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                ->label('Appointment Date')
                ->sortable()
                ->getStateUsing(function (Appointment $record) {
                    return Carbon::parse($record->date)->format('F j, Y');
                }),
                Tables\Columns\TextColumn::make('time')
                ->label('Appointment Time')
                ->sortable()
                ->getStateUsing(function (Appointment $record) {
                    if ($record->time) {
                        return Carbon::parse($record->time)->format('g:i A');
                    } else {
                        return "--:--";
                    }
                }),
                Tables\Columns\TextColumn::make('service.name')
                ->label('Service')
                ->searchable(),
                Tables\Columns\TextColumn::make('doctor_user_id')
                ->label('Doctor/Dentist')
                ->getStateUsing(function (Appointment $record) {
                    $doctor = User::find($record->doctor_user_id);
                    return $doctor ? $doctor->name : '';
                })
                ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->Badge()
                ->getStateUsing(function (Appointment $record): string {
                    if ($record->isApproved()) {
                        return 'Approved';
                    } elseif ($record->isCancelled()) {
                        return 'Cancelled';
                    } else {
                        return 'Pending';
                    }
                })
                ->colors([
                    'success' => 'Approved',
                    'danger' => 'Cancelled',
                    'warning' => 'Pending'
                ]),
                Tables\Columns\TextColumn::make('finished')
                ->label('Service Status')
                ->Badge()
                ->getStateUsing(function (Appointment $record): string {
                    if ($record->isCompleted()) {
                        return 'Successful';
                    } elseif ($record->isAttend()) {
                        return 'Not attended';
                    } elseif ($record->isCancelled()) {
                        return 'Cancelled';
                    } else {
                        return 'Pending';
                    }
                })
                ->colors([
                    'success' => 'Successful',
                    'primary' => 'Not attended',
                    'warning' => 'Pending',
                    'danger' => 'Cancelled',

                ]),
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
                ->trueLabel(' With Archive Record')
                ->falseLabel('Archive Record Only')
                ->placeholder('All')
                ->default(null),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('Cancelled')
                    ->action(function (Appointment $record, $data) {
                        $record->update(['status' => 'cancelled',]);
                    })
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->role->name === 'Staff' || $user->role->name === 'Admin'  || $user->role->name === 'Dentist'  || $user->role->name === 'Doctor'  || $user->role->name === 'Patient';
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (Appointment $record): bool => $record->status === 'cancelled')
                    ->color('danger')
                    ->icon('heroicon-o-archive-box-x-mark'),
                    Tables\Actions\ViewAction::make()
                    ->color('primary'),
                    Tables\Actions\EditAction::make()
                    ->hidden(fn (Appointment $record): bool => $record->status === 'approved' || $record->status === 'cancelled')
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
            'index' => Pages\ListAppointmentPatients::route('/'),
            'create' => Pages\CreateAppointmentPatient::route('/create'),
            // 'edit' => Pages\EditAppointmentPatient::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        $query = parent::getEloquentQuery();

        if ($user->role->name === 'Admin' || $user->role->name === 'Staff') {
            return $query->withoutGlobalScopes([SoftDeletingScope::class]);
        } elseif ($user->role->name === 'Doctor'  || $user->role->name === 'Dentist') {
            return $query->where('doctor_user_id', $user->id)
                ->withoutGlobalScopes([SoftDeletingScope::class]);
        } elseif ($user->role->name === 'Patient') {
            return $query->where('user_id', $user->id)
                ->withoutGlobalScopes([SoftDeletingScope::class]);
        }
        return $query;
    }
    public static function getWidgets(): array
    {
        return [
            Widgets\AppointmentStatsOverview::class,
        ];
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Patient information')
                ->description('Personal Information.')
                ->schema([
                    Infolists\Components\Grid::make(1)->schema([
                        Infolists\Components\Grid::make(3)->schema([
                            Infolists\Components\Section::make('')
                                ->schema([
                                    Infolists\Components\Grid::make(4)->schema([
                                        Infolists\Components\TextEntry::make('fullname')
                                            ->label('Patient name')
                                            ->getStateUsing(function (Appointment $record) {
                                                return "{$record->last}, {$record->first} {$record->middle}";
                                            }),
                                        Infolists\Components\TextEntry::make('age')
                                            ->label('Age'),
                                        Infolists\Components\TextEntry::make('gender')
                                            ->label('Gender'),
                                        Infolists\Components\TextEntry::make('Phone')
                                            ->label('Phone number'),
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
                Infolists\Components\Section::make('Address')
                ->description('Address Information.')
                ->schema([
                    Infolists\Components\Grid::make(1)->schema([
                        Infolists\Components\Grid::make(3)->schema([
                            Infolists\Components\Section::make('')
                                ->schema([
                                    Infolists\Components\Grid::make(4)->schema([
                                        Infolists\Components\TextEntry::make('province')
                                            ->label('Province'),
                                        Infolists\Components\TextEntry::make('city')
                                            ->label('CIty/Municipality'),
                                        Infolists\Components\TextEntry::make('barangay')
                                            ->label('Barangay'),
                                        Infolists\Components\TextEntry::make('unit')
                                            ->label('Unit no., floor, building, street'),
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
                Infolists\Components\Section::make('Appointment')
                ->description('Appointment Information.')
                ->schema([
                    Infolists\Components\Grid::make(1)->schema([
                        Infolists\Components\Grid::make(3)->schema([
                            Infolists\Components\Section::make('')
                                ->schema([
                                    Infolists\Components\Grid::make(4)->schema([
                                        Infolists\Components\TextEntry::make('service.name')
                                        ->label('Service'),
                                        Infolists\Components\TextEntry::make('doctor_user_id')
                                            ->label('Doctor/Dentist')
                                            ->getStateUsing(function (Appointment $record) {
                                                $doctor = User::find($record->doctor_user_id);
                                                return $doctor ? $doctor->name : '';
                                            }),
                                        Infolists\Components\TextEntry::make('date')
                                            ->label('Appointment Date')
                                            ->getStateUsing(function (Appointment $record) {
                                                return Carbon::parse($record->date)->format('F j, Y');
                                            }),
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
        ]);
    }

}

