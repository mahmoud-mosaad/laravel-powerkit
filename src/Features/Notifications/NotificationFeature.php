<?php

namespace MahmoudMosaad\PowerKit\Features\Notifications;

use Illuminate\Support\Facades\Log;

class NotificationFeature
{
    public static function send(string $message): void
    {
        Log::info("[PowerKit Notification] {$message}");
    }
}
