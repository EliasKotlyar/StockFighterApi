<?php
namespace Twinsen\StockFighterApi\Models\Order\Response;
class Response
{
    /**
     * @var string
     */
    protected $ok;
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
    protected $originalQty;
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
    protected $id;
    /**
     * @var string
     */
    protected $account;
    /**
     * @var \DateTime
     */
    protected $ts;
    /**
     * @var Fills[]
     */
    protected $fills;
    /**
     * @var string
     */
    protected $totalFilled;
    /**
     * @var string
     */
    protected $open;

    /**
     * @return string
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param string $open
     */
    public function setOpen($open)
    {
        $this->open = $open;
    }

    /**
     * @return string
     */
    public function getOk()
    {
        return $this->ok;
    }

    /**
     * @param string $ok
     */
    public function setOk($ok)
    {
        $this->ok = $ok;
    }

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
    public function getOriginalQty()
    {
        return $this->originalQty;
    }

    /**
     * @param string $originalQty
     */
    public function setOriginalQty($originalQty)
    {
        $this->originalQty = $originalQty;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Fills[]
     */
    public function getFills()
    {
        return $this->fills;
    }

    /**
     * @param Fills[] $fills
     */
    public function setFills($fills)
    {
        $this->fills = $fills;
    }

    /**
     * @param Fills $fills
     */
    public function addFills($fill)
    {
        $this->fills[] = $fill;
    }

    /**
     * @return string
     */
    public function getTotalFilled()
    {
        return $this->totalFilled;
    }

    /**
     * @param string $totalFilled
     */
    public function setTotalFilled($totalFilled)
    {
        $this->totalFilled = $totalFilled;
    }

    /**
     * @param $jsonString
     */
    public function parseFromJson($jsonString){
        die($jsonString);
        $orderResponseArray = json_decode($jsonString, true);
        $this->setOk($orderResponseArray["ok"]);
        $this->setSymbol($orderResponseArray["symbol"]);
        $this->setVenue($orderResponseArray["venue"]);
        $this->setDirection($orderResponseArray["direction"]);
        $this->setOriginalQty($orderResponseArray["originalQty"]);
        $this->setQty($orderResponseArray["qty"]);
        $this->setPrice($orderResponseArray["price"]);
        $this->setType($orderResponseArray["type"]);
        $this->setId($orderResponseArray["id"]);
        $this->setAccount($orderResponseArray["account"]);
        $this->setTs(\DateTime::createFromFormat(\DateTime::ATOM, $orderResponseArray["ts"]));

        //$this->setFills();
        if(isset($orderResponseArray["fills"])){
            foreach($orderResponseArray["fills"] as $fillArray){
                $fill = new Fills();
                $fill->parse($fillArray);
                $this->addFills($fill);
            }
        }


        $this->setTotalFilled($orderResponseArray["totalFilled"]);
        $this->setOpen($orderResponseArray["open"]);
        return $this;
    }

}

