<?php

declare(strict_types=1);

namespace Francken\Infrastructure;

use DateTimeImmutable;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

final class NavigationServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        View::composer('layout._header', function ($view) : void {
            $menu = $this->app->config->get('francken.navigation.menu');
            $menu[1]['icon'] = $this->associationIcon();

            if (Auth::check()) {
                $user = Auth::user();
                $menu[] = [
                    'url' => '/profile',
                    'title' => 'Profile',
                    'icon' => 'user',
                    'subItems' => [
                        // Job prospects
                        ['url' => '/profile/expenses', 'icon' => 'fa fa-chart-bar', 'title' => 'Expenses'],
                        ['url' => '/logout', 'icon' => 'fas fa-sign-out-alt', 'title' => 'Logout']
                    ],
                ];
            } else {
                $menu[] = [
                    'url' => '/login',
                    'title' => 'Login',
                    'subItems' => [],
                    'icon' => '',
                    'class' => 'login-link',
                ];
            }

            $view->with('items', $menu);
        });

        View::composer('admin.layout', function ($view) : void {
            $menu = $this->app->config->get('francken.navigation.admin-menu');

            $view->with('menu', $menu);
        });

        View::composer('homepage._pillars', function ($view) : void {
            $view->with('associationIcon', $this->associationIcon());
        });
    }

    public function associationIcon()
    {
        $now = (new DateTimeImmutable())
            ->setTimeZone(new DateTimeZone('Europe/Amsterdam'));

        $fourOClock = DateTimeImmutable::createFromFormat('H a', '4 pm')
            ->setTimeZone(new DateTimeZone('Europe/Amsterdam'));

        $fourOClockMorning = DateTimeImmutable::createFromFormat('H a', '4 am')
            ->setTimeZone(new DateTimeZone('Europe/Amsterdam'));

        if ($fourOClockMorning < $now && $now < $fourOClock) {
            return 'coffee';
        }

        return 'beer';
    }
}
