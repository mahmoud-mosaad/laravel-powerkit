<?php

namespace MahmoudMosaad\PowerKit\Contracts;

interface PowerKitFeatureContract
{
    public function boot(): void;

    public function isEnabled(): bool;
}
