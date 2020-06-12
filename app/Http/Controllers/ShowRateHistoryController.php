<?php

namespace App\Http\Controllers;

use App\Rate;
use SimpleXMLElement;

class ShowRateHistoryController extends Controller
{
    public function __invoke()
    {
        $feedUrl = 'https://www.bank.lv/vk/ecb_rss.xml';
        $content = file_get_contents($feedUrl);
        $xml = new SimpleXmlElement($content);

        $xmlInfo = $xml->channel;

        $lastUpdate = Rate::lastUpdate();

        return view('current-rate', [
            'xmlInfo' => $xmlInfo,
            'lastUpdate' => $lastUpdate
        ]);
    }
}
