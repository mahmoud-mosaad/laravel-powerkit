<?php

namespace MahmoudMosaad\PowerKit\Commands;

use Illuminate\Console\Command;
use MahmoudMosaad\PowerKit\Facades\PowerKit;

class PowerKitCommand extends Command
{
    protected $signature = 'powerkit:hello';

    protected $description = 'Display a welcome message from PowerKit';

    public function handle(): int
    {
        $this->info(PowerKit::sayHello());

        return self::SUCCESS;
    }
}
