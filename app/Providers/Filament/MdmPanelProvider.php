<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Openplain\FilamentShadcnTheme\Color;
use Filament\Support\Colors\Color as FilamentColor;
use Filament\Support\Enums\Width;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class MdmPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('mdm')
            ->path('mdm')
            ->viteTheme('resources/css/filament/mdm/theme.css')
            ->login()
            ->colors([
                'primary' => Color::adaptive(
                    lightColor: FilamentColor::Blue,
                    darkColor: FilamentColor::Teal
                )
            ])
            ->profile(isSimple: false)
            ->assets([
                // Css::make('custom-stylesheet', asset('css/app/custom-stylesheet.css')),
                Css::make('custom-stylesheet-fontawesome-all.min', asset('css/app/custom-stylesheet-fontawesome-all.min.css')),
                Css::make('repeater-enhancements', asset('css/app/repeater-enhancements.css')),
                Js::make('repeater-enhancements', asset('js/app/repeater-enhancements.js')),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
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
            ->plugins([
                \Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin::make()
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandName('')
            ->brandLogo(null)
            ->maxContentWidth(Width::Full)
            ->sidebarWidth('12rem')
            ->databaseNotifications()
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn() => view('filament.top-bar-start'),
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_LOGO_AFTER,
                fn() => view('filament.top-bar-before'),
            );
    }
}
