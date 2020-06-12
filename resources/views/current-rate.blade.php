<head>
    <title>Currency Rates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<?php $currency = \Illuminate\Support\Facades\Request::route('key')?>

<p class="text-right small mr-2 mt-2">last update: {{$lastUpdate}}</p>
<h4 class="text-center mt-4 mb-5">Previous Days Currency Rates</h4>

<?php
$feed_url = 'https://www.bank.lv/vk/ecb_rss.xml';
$content = file_get_contents($feed_url);
$xml = new SimpleXmlElement($content);

$as = $xml->xpath("//description");

$keys = array_keys($as);
$last = end($keys);

$xmlInfo = $xml->channel;

for ($i = 0; $i <= $last-1; $i++) {

$curr = $xmlInfo->item[$i]->description;

$date = $xmlInfo->item[$i]->pubDate;
preg_match('/^([^ ]+ +[^ ]+ +[^ ]+ +[^ ]+) +(.*)$/', $date, $shortDate);

$arr = explode(' ', trim($curr));

$assoc = array();
foreach (array_chunk($arr, 2) as $pair) {
    list($key, $value) = $pair;
    $assoc[$key] = $value;
}

?>
<table class="table col-md-6 m-auto text-center">
    <tr>
        <th class="col-md-4">
            {{$shortDate[1]}}:
        </th >
        <th class="font-weight-normal col-md-4">
            {{$assoc[$currency]}}
        </th>
    </tr>
</table>
<?php
}
?>

<div class="text-center mt-5">
    <a href="{{ route('show-all-rates') }}">
    <button class="btn btn-outline-success">Back to all Currencies</button>
    </a>
</div>



