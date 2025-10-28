<?php

namespace MahmoudMosaad\PowerKit\Features\Payments;

use MahmoudMosaad\PowerKit\Contracts\PowerKitFeatureContract;

class PaymentsManager implements PowerKitFeatureContract
{
    public function boot(): void
    {
        // Initialize payment gateways
    }

    public function isEnabled(): bool
    {
        return config('powerkit.features.payments', false);
    }

    public function charge($user, float $amount)
    {
        // Example charge logic
        return "Charging {$user->name} {$amount}$";
    }
}
