<?php

namespace MahmoudMosaad\PowerKit;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

/**
 * PowerKitManager
 *
 * Central manager for all PowerKit features (notifications, payments, etc.).
 * Provides a single entry point for interacting with your package.
 */
class PowerKitManager
{
    /**
     * Package configuration.
     */
    protected array $config;

    /**
     * Create a new PowerKit manager instance.
     */
    public function __construct()
    {
        $this->config = Config::get('powerkit', []);
    }

    /**
     * Get a configuration value.
     */
    public function config(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * Example: Log a package-level message.
     */
    public function log(string $message, string $level = 'info'): void
    {
        Log::channel($this->config['log_channel'] ?? 'stack')
            ->{$level}("[PowerKit] {$message}");
    }

    /**
     * Example: Access an enabled feature instance.
     */
    public function feature(string $feature)
    {
        $feature = ucfirst($feature);
        $class = __NAMESPACE__."\\Features\\{$feature}\\{$feature}Manager";

        if (! class_exists($class)) {
            throw new \InvalidArgumentException("Feature [{$feature}] not found or not enabled.");
        }

        return App::make($class);
    }

    /**
     * Example utility that could be used by all features.
     */
    public function formatAmount($amount, $currency = 'USD'): string
    {
        return number_format($amount, 2).' '.strtoupper($currency);
    }

    /**
     * Check if a feature is enabled in config.
     */
    public function isFeatureEnabled(string $feature): bool
    {
        return (bool) ($this->config['features'][$feature] ?? false);
    }
}
