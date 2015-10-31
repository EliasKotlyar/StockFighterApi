<?php
namespace Twinsen\StockFighterApi\Models\Order\Response;
class Fills{
    /**
     * @var string
     */
    protected $qty;
    /**
     * @var string
     */
    protected $price;

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
     * @return \DateTime
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * @param \DateTime $ts
     */
    public function setTs($ts)
    {
        $this->ts = $ts;
    }
    /**
     * @var \DateTime
     */
    protected $ts;
    /**
     * @param $
     */
    public function parse($array){
        $this->setQty($array["qty"]);
        $this->setPrice($array["price"]);
        $this->setTs(\DateTime::createFromFormat(\DateTime::ATOM, $array["ts"]));
        return $this;
    }
}