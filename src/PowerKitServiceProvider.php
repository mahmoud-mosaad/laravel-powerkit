<?php

namespace MahmoudMosaad\PowerKit;

use MahmoudMosaad\PowerKit\Commands\PowerKitCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PowerKitServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('powerkit')
            ->hasConfigFile('powerkit')
            ->hasMigrations([
                'create_migration_table_name_table',
            ])
            ->hasCommands([
                PowerKitCommand::class,
            ])
            ->hasViews('powerkit')
            ->hasTranslations();
    }

    /**
     * Register package services, bindings, helpers, etc.
     */
    public function registeringPackage(): void
    {
        // Example: Register a singleton or binding for your package
        $this->app->singleton('powerkit', function () {
            return new PowerKitManager;
        });

        // Auto-load helper functions if any exist
        $this->loadHelpers();
    }

    /**
     * Boot actions after package registration.
     */
    public function bootingPackage(): void
    {
        // Optionally auto-load modular features
        $this->loadFeaturesFromConfig();
    }

    /**
     * Load all enabled features dynamically from config/powerkit.php
     */
    protected function loadFeaturesFromConfig(): void
    {
        $features = config('powerkit.features', []);

        foreach ($features as $feature => $enabled) {
            if (! $enabled) {
                continue;
            }

            $class = __NAMESPACE__.'\\Features\\'.ucfirst($feature).'\\'.ucfirst($feature).'ServiceProvider';

            if (class_exists($class)) {
                $this->app->register($class);
            }
        }
    }

    /**
     * Automatically load helper files inside the package/helpers directory.
     */
    protected function loadHelpers(): void
    {
        $helpersPath = __DIR__.'/helpers';
        if (! is_dir($helpersPath)) {
            return;
        }

        foreach (glob($helpersPath.'/*.php') as $helperFile) {
            require_once $helperFile;
        }
    }
}
