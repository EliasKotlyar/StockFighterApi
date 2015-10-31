<?php
if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}
use Twinsen\StockFighterApi\Models\Order\Constants;
use \Twinsen\StockFighterApi\Models\Order\Order;

$order = new Order();
$order->setSymbol('BAR');
$order->setVenue('FOOEX');
$order->setDirection(Constants::DIRECTION_BUY);
$order->setQty(20);
$order->setPrice(5100);
$order->setType(Constants::TYPE_LIMIT);
$order->setAccount('OGB12345');
var_dump($order->toJson());
// Output should be the same like this:

/*
{
    “symbol”: “BAR”,
  “venue”: “FOOEX”,
  “direction”: “buy”,
  “qty”: 20,
  “price”:  5100,
  “type”: “limit”,
  “account” : “OGB12345”, // your trading account (game gives you this)
}
taken from Page http://www.kalzumeus.com/2015/10/30/developing-in-stockfighter-with-no-trading-experience/
*/
