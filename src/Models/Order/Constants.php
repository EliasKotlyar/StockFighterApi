<?php
namespace Twinsen\StockFighterApi\Models\Order;
class Constants{
    /**
     * Direction:
     */
    const DIRECTION_BUY = "buy";
    const DIRECTION_SELL = "sell";
    /**
     * Order Types:
     */
    const TYPE_LIMIT = "limit";
    // Probably - not sure:
    const TYPE_IOC = "ioc";
    const TYPE_FOK = "fok";
    const TYPE_MARKET = "market";
}