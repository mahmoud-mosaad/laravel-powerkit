<?php

namespace MahmoudMosaad\PowerKit\Support;

class Utilities
{
    public static function formatAmount(float $amount): string
    {
        return number_format($amount, 2);
    }

    public static function isProduction(): bool
    {
        return app()->environment('production');
    }
}
