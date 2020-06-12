<?php

namespace App\Console\Commands;

use App\Rate;
use Illuminate\Console\Command;

class UpdateRates extends Command
{
    protected $signature = 'update:rates';

    protected $description = 'Update exchange rates from xml to database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $rates = Rate::lastDay();

        foreach ($rates as $key => $value) {

            Rate::updateOrCreate([
                'currency' => $key,
            ],['rate' => $value]);

        }
        $this->info('Exchange rates have been updated. Check database');
    }
}
