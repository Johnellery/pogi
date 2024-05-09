<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rules\Password;
use App\Filament\Auth\Register;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;
use Afsakar\FilamentOtpLogin\FilamentOtpLoginPlugin;
use Filament\Support\Facades\FilamentView;
use Rupadana\FilamentAnnounce\FilamentAnnouncePlugin;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->passwordReset()
            ->registration(Register::class)
            ->brandLogo(asset('storage/logo.png'))
            ->brandLogoHeight('10rem')
            ->sidebarFullyCollapsibleOnDesktop()
            // ->emailVerification()
            ->colors([
                'primary' => Color::Indigo,
                // 'success' => Color::Lime,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,

            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->favicon(asset('storage/logo.png'))
            ->plugins([
                // FilamentView::registerRenderHook(
                //     PanelsRenderHook::PAGE_START,
                //     fn (): View => view('warning-banner'),
                //     scopes: \App\Filament\Resources\UserResource::class,
                // ),
                BreezyCore::make()
                ->avatarUploadComponent(fn() => FileUpload::make('avatar_url')->disk('public'))
                ->enableTwoFactorAuthentication(
                    force: false,
                )
                ->myProfile(
                    shouldRegisterUserMenu: true,
                    // shouldRegisterNavigation: true,
                    // navigationGroup: 'Settings',
                    hasAvatars: true,
                    slug: 'my-profile'
                )
                ->passwordUpdateRules(
                    rules: [Password::default()
                            ->mixedCase()
                            ->uncompromised(3)],
                    requiresCurrentPassword: true,
                ),
                // FilamentAnnouncePlugin::make()
                // ->pollingInterval('30s')
                // ->defaultColor(Color::Blue)
            ]);
    }
}
