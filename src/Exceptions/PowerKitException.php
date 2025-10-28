<?php

namespace MahmoudMosaad\PowerKit\Exceptions;

use Exception;

class PowerKitException extends Exception
{
    public static function featureNotFound(string $feature): self
    {
        return new self("PowerKit feature [{$feature}] not found.");
    }
}
