<?php

namespace App\Providers\Filament;

use App\Filament\Portal\Pages\Reports;
use App\Filament\Portal\Resources\JobResource\Widgets\StatsOverview;
use App\Filament\Portal\Widgets\ApplicationStatusChart;
use App\Filament\Portal\Widgets\JobStatusChart;
use App\Filament\Portal\Widgets\RecentApplicationsWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PortalPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('portal')
            ->path('portal')
            ->login()
            ->colors([
                'primary' => Color::hex('#c92027'),
                'secondary' => Color::hex('#151457'),
                'success' => Color::Green,
                'warning' => Color::Amber,
                'danger' => Color::Red,
                'info' => Color::Blue,
            ])
            ->brandLogo(asset('images/logo/logo.png'))
            ->darkModeBrandLogo(asset('images/logo/HR-Logo-White.png'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('images/favicon.png'))
            ->brandName('HR Portal')
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                'Job Management',
                'System',
            ])
            ->discoverResources(in: app_path('Filament/Portal/Resources'), for: 'App\\Filament\\Portal\\Resources')
            ->discoverPages(in: app_path('Filament/Portal/Pages'), for: 'App\\Filament\\Portal\\Pages')
            ->pages([
                Pages\Dashboard::class, Reports::class,
            ])
//            ->discoverWidgets(in: app_path('Filament/Portal/Widgets'), for: 'App\\Filament\\Portal\\Widgets')
            ->widgets([
                StatsOverview::class,
//                JobStatusChart::class,
//                ApplicationStatusChart::class,
                RecentApplicationsWidget::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
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
//            ->viteTheme('resources/css/filament/portal/theme.css')
            ->maxContentWidth('full')
            ->spa();
    }
}
