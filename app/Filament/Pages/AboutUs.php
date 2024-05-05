<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AboutUs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $activeNavigationIcon = 'heroicon-s-home-modern';
    protected static ?int $navigationSort = 40;
    protected static ?string $navigationGroup = 'Clinic Information';
    protected static string $view = 'filament.pages.about-us';
}
