<?php

namespace MahmoudMosaad\PowerKit;

class PowerKit
{
    public function notify(string $message): void
    {
        // Example notification logic
        logger()->info("[PowerKit Notification] {$message}");
    }

    public function payment(): Features\Payments\PaymentsManager
    {
        return new Features\Payments\PaymentsManager;
    }

    public function exception(): Features\Exceptions\ExceptionManager
    {
        return new Features\Exceptions\ExceptionManager;
    }
}
