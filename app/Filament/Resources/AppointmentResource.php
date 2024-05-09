<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
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
use App\Models\Service;
use App\Models\Philprovince;
use DB;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $activeNavigationIcon = 'heroicon-s-calendar-days';
    protected static ?int $navigationSort = 15;
    protected static ?string $navigationGroup = 'Patient';
    public static function shouldRegisterNavigation(): bool
    {
        $userole = Auth::user();
        $user = $userole->role->name;
        return $user && $user=== 'Admin'   || $user === 'Staff' || $user === 'Doctor' || $user === 'Dentist';
    }

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
        ->defaultPaginationPageOption(5)
        ->defaultSort('date', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                ->searchable()
                ->label('Patient name')
                ->getStateUsing(function (Appointment $record) {
                    return "{$record->last}, {$record->first} {$record->middle}";
                }),
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
                ->label('Service'),
                Tables\Columns\TextColumn::make('doctor_user_id')
                ->label('Doctor/Dentist')
                ->visible(function () {
                    $user = Auth::user();
                    return $user->role->name === 'Doctor' || $user->role->name === 'Dentist';
                })
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
                        return 'Not Attended';
                    } elseif ($record->isCancelled()) {
                        return 'Cancelled';
                    } else {
                        return 'Pending';
                    }
                })
                ->colors([
                    'success' => 'Successful',
                    'primary' => 'Not Attended',
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
                    Tables\Actions\Action::make('Approved')
                    ->url(fn (Appointment $record) => route('approved', $record))

                    ->successNotificationTitle('Appointment Status notice send successfully')
                    ->action(function (Appointment $record, $data) {
                        $record->update(['status' => 'approved']);
                    })
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->role->name === 'Staff' || $user->role->name === 'Admin' || $user->role->name === 'Dentist'  || $user->role->name === 'Doctor';
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (Appointment $record): bool => $record->status === 'approved' || $record->status === 'cancelled')
                    ->color('success')
                    ->icon('heroicon-o-check-circle'),
                    Tables\Actions\Action::make('Cancelled')
                    ->url(fn (Appointment $record) => route('cancelled', $record))
                    ->successNotificationTitle('Appointment Status notice send successfully')
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->role->name === 'Staff' || $user->role->name === 'Admin'  || $user->role->name === 'Dentist'  || $user->role->name === 'Doctor'  || $user->role->name === 'Patient';
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (Appointment $record): bool => $record->status === 'cancelled' || $record->finished === 'attend')
                    ->color('danger')
                    ->icon('heroicon-o-archive-box-x-mark'),
                    Tables\Actions\Action::make('Succesful')
                    ->action(function (Appointment $record, $data) {
                        $record->update(['finished' => 'completed']);
                    })
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->role->name === 'Staff' || $user->role->name === 'Admin' || $user->role->name === 'Dentist'  || $user->role->name === 'Doctor';
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (Appointment $record): bool => $record->finished === 'attend' || $record->status === 'cancelled' || $record->status === 'pending' || $record->finished === 'completed')
                    ->color('success')
                    ->icon('heroicon-o-check-circle'),
                    Tables\Actions\Action::make('Not attended')
                    ->action(function (Appointment $record, $data) {
                        $record->update(['finished' => 'attend']);
                    })
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->role->name === 'Staff' || $user->role->name === 'Admin'  || $user->role->name === 'Dentist'  || $user->role->name === 'Doctor';
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (Appointment $record): bool => $record->status === 'cancelled' || $record->finished === 'attend' || $record->status === 'pending' || $record->finished === 'completed')
                    ->color('danger')
                    ->icon('heroicon-o-archive-box-x-mark'),
                    Tables\Actions\ViewAction::make()
                    ->color('primary'),

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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            // 'edit' => Pages\EditAppointment::route('/{record}/edit'),
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
            Infolists\Components\Section::make('Patient Information')
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
                ->description('Permanent Address.')
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
                                        Infolists\Components\TextEntry::make('date')
                                            ->label('Appointment Time')
                                            ->getStateUsing(function (Appointment $record) {
                                                if ($record->time) {
                                                    return Carbon::parse($record->time)->format('g:i A');
                                                } else {
                                                    return "--:--";
                                                }
                                            }),
                                    ])
                                ]),
                        ]),
                    ]),
                ]),
        ]);
    }

}
