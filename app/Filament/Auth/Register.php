<?php

namespace App\Filament\Auth;

use App\Mail\OTPNotification;
use App\Models\Philbrgy;
use App\Models\Philmuni;
use App\Models\Philprovince;
use App\Models\Role;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Wizard;
use HasanAhani\FilamentOtpInput\Components\OtpInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;

class Register extends \Filament\Pages\Auth\Register
{
    public function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Wizard\Step::make('1')
                ->label('')
                    ->icon('heroicon-o-user')
                    ->schema([
                        $this->getNameFormComponent(),
                        TextInput::make('email')
                            ->email()
                            ->unique()
                            ->required()
                            ->placeholder('Enter the Email address')
                            ->afterStateUpdated(function ($set) {
                                $otp = mt_rand(100000, 999999);
                                $rememberToken = Str::random(10);

                                $set('otp', $otp);
                                $set('remember_token', $rememberToken);
                                $set('expired', Carbon::now()->addMinutes(5));
                            }),
                        Hidden::make('otp')
                            ->reactive(),
                        Hidden::make('expired')
                            ->reactive(),
                        Hidden::make('remember_token')
                            ->reactive(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ]),
                Wizard\Step::make('2')
                ->label('')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('first')
                            ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                            ->required()
                            ->placeholder('Enter your First name')
                            ->label('First name'),
                        TextInput::make('middle')
                            ->placeholder('Enter your Middle name')
                            ->label('Middle name (Optional)'),
                        TextInput::make('last')
                            ->placeholder('Enter your Last name')
                            ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                            ->required()
                            ->label('Last name')
                            ->afterStateUpdated(function ($set, $get) {
                                $first = $get('first');
                                $middle = $get('middle');
                                $last = $get('last');

                                if ($middle !== null) {
                                    $fullname = $first . ' ' . $middle . ' ' . $last;
                                } else {
                                    $fullname = $first . ' ' . $last;
                                }

                                $set('fullname', $fullname);
                            }),
                        Hidden::make('fullname')
                            ->reactive(),
                        TextInput::make('age')
                            ->required()
                            ->placeholder('Enter your Age')
                            ->rule(rule:'numeric')
                            ->label('Age'),
                        Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female'
                            ])
                            ->native(false)
                            ->required()
                            ->preload()
                            ->placeholder('Select a Gender')
                            ->label('Gender'),
                        TextInput::make('phone')
                            ->minLength(11)
                            ->rule('numeric')
                            ->placeholder('Enter your Contact Number')
                            ->required()
                            ->label('Contact Number'),
                    ]),
                Wizard\Step::make('3')
                    ->label('')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        Select::make('province')
                            ->reactive()
                            ->required()
                            ->preload()
                            ->placeholder('Select your Province')
                            ->native(false)
                            ->label('Province Name')
                            ->options(function () {
                                return Philprovince::all()->pluck('provDesc', 'provDesc');
                            }),
                        Select::make('city')
                            ->reactive()
                            ->placeholder('Select your City/Municipality')
                            ->preload()
                            ->required()
                            ->native(false)
                            ->label('City/Municipality Name')
                            ->options(function (callable $get) {
                                $provCode = optional(Philprovince::where('provDesc', $get('province'))->first());
                                return Philmuni::where('provCode', '=', $provCode->provCode ?? '')->pluck('citymunDesc', 'citymunDesc');
                            }),
                        Select::make('barangay')
                            ->label('Barangay Name')
                            ->preload()
                            ->required()
                            ->placeholder('Select your Barangay')
                            ->native(false)
                            ->options(function (callable $get) {
                                $provCode = optional(Philprovince::where('provDesc', $get('province'))->first());
                                $muniCode = optional(Philmuni::where('provCode', '=', $provCode->provCode ?? '')->where('citymunDesc', $get('city'))->first());
                                return Philbrgy::where('citymunCode', '=', $muniCode->citymunCode ?? '')->pluck('brgyDesc', 'brgyDesc');
                            }),
                        TextInput::make('unit')
                            ->minLength(2)
                            ->placeholder('Enter the Unit no., floor, building, street')
                            ->maxLength(255)
                            ->required()
                            ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                            ->label('Unit no., floor, building, street'),
                    ]),
            ]),
        ])->statePath('data');
    }
}
