<?php

namespace App\Http\Controllers;

use App\Rate;

class ShowRatesController extends Controller
{
    public function __invoke()
    {
        $lastDayRates = Rate::lastDay();

        $lastUpdate = Rate::lastUpdate();

        return view('all-rates', [
            'lastDayRates' => $lastDayRates,
            'lastUpdate' => $lastUpdate]);
    }
}

