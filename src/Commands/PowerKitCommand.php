<?php

namespace MahmoudMosaad\PowerKit\Commands;

use Illuminate\Console\Command;

class PowerKitCommand extends Command
{
    public $signature = 'powerkit';

    public $description = 'Power Kit';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
