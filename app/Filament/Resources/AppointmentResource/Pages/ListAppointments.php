<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add new Appointment')
            ->visible(function () {
                $user = Auth::user();
                return $user->role->name === 'Patient' ;
            })
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            AppointmentResource\Widgets\AppointmentStatsOverview::class,
        ];
    }
    // public function getTabs(): array
    // {
    //     $currentDate = Carbon::today();
    //     $tommorrow = $currentDate->copy()->addDay();
    //     $addWeek = $currentDate->copy()->addWeek();
    //     $nextMonth = $currentDate->copy()->addMonth();

    //     return [
    //         'all' => Tab::make(),
    //         'Today' => Tab::make()

    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('date', $currentDate->toDateString())),
    //             // ->hide(function () {
    //             //     $user = Auth::user();
    //             //     return $user->role->name === 'Staff' || $user->role->name === 'Admin';
    //             // }),
    //         'Tommorrow' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('date', $tommorrow->toDateString())),
    //         'Next Week' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('date', $addWeek->toDateString())),
    //         'Next Month' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('date', $nextMonth->toDateString())),
    //     ];
    // }
}
