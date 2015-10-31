<?php
namespace Twinsen\StockFighterApi\Models\Order\Request;
class Order
{
    /**
     * @var string
     */
    protected $symbol;
    /**
     * @var string
     */
    protected $venue;
    /**
     * @var string
     */
    protected $direction;
    /**
     * @var string
     */
    protected $qty;
    /**
     * @var string
     */
    protected $price;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $account;

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param string $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param string $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function toJson(){
       return json_encode(
           array(
               'symbol'=>$this->getSymbol(),
               'venue'=>$this->getVenue(),
               'direction'=>$this->getDirection(),
               'price'=>$this->getPrice(),
               'type'=>$this->getType(),
               'account'=>$this->getAccount()
           )
       );
    }

}