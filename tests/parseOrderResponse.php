<?php
if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}
use Twinsen\StockFighterApi\Models\Order\Response\Response;

$orderResponseJson =
'
{
"ok": true,
"symbol": "BAR",
"venue": "FOOEX",
"direction": "buy",
"originalQty": 100,
"qty": 20,
"price":  5100,
"type": "limit",
"id": 12345,
"account" : "OGB12345",
"ts": "2015-07-05T22:16:18+00:00",
"fills":
[
{
"price": 5050,
"qty": 50,
"ts": "2015-07-05T22:16:18+00:00"
}
],
"totalFilled": 80,
"open": true
}
';

$response = new Response();
$response->parseFromJson($orderResponseJson);
var_dump($response);