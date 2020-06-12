<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

class Rate extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency', 'rate'
    ];

    public $timestamps = false;

    public static function lastDay()
    {
        $feedUrl = 'https://www.bank.lv/vk/ecb_rss.xml';
        $content = file_get_contents($feedUrl);
        $xml = new SimpleXmlElement($content);

        $onlyDescription = $xml->xpath("//description");
        $keys = array_keys($onlyDescription);
        $last = end($keys);

        $string = $xml->channel->item[$last - 1]->description;

        $arr = explode(' ', trim($string));

        $assoc = array();
        foreach (array_chunk($arr, 2) as $pair) {
            list($key, $value) = $pair;
            $assoc[$key] = $value;
        }
        return $assoc;
    }

    public static function lastUpdate()
    {
        $feedUrl = 'https://www.bank.lv/vk/ecb_rss.xml';
        $content = file_get_contents($feedUrl);
        $xml = new SimpleXmlElement($content);
        $onlyPubDate = $xml->xpath("//pubDate");
        $keys = array_keys($onlyPubDate);
        $last = end($keys);

        return $onlyPubDate[$last];
    }
}
