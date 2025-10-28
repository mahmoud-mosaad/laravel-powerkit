<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use MahmoudMosaad\PowerKit\Facades\PowerKit;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // You can call PowerKit methods here for testing
        PowerKit::info('PowerKit is active!');
    }

    public function register(): void
    {
        //
    }
}
