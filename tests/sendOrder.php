<?php
if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}
use Twinsen\StockFighterApi\Models\Order\Constants;
use \Twinsen\StockFighterApi\Models\Order\Request\Order;
use \Twinsen\StockFighterApi\Models\Manager\OrderManager;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

$order = new Order();
$order->setSymbol('BAR');
$order->setVenue('FOOEX');
$order->setDirection(Constants::DIRECTION_BUY);
$order->setQty(20);
$order->setPrice(5100);
$order->setType(Constants::TYPE_LIMIT);
$order->setAccount('OGB12345');

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
/* Mock Handler */
$mock = new MockHandler([
    new Response(200, array(),$orderResponseJson),
]);
$handler = HandlerStack::create($mock);

$url = 'http://starfighters.io/';
$manager = new OrderManager($url, ['handler' => $handler]);


$response = $manager->sendOrder($order);
var_dump($response);
