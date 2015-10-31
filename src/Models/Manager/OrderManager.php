<?php
namespace Twinsen\StockFighterApi\Models\Manager;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;
use Twinsen\StockFighterApi\Models\Order\Response\Response;
use \Twinsen\StockFighterApi\Models\Order\Request\Order;

class OrderManager
{
    /**
     * @var Client
     */
    protected $client;

    function __construct($url,$options=array()){
        $this->setUrl($url);
        $this->client = new Client($options);
    }
    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param Order $order
     * @return Response
     */
    public function sendOrder(Order $order){
        $url = sprintf("%s/venues/%s/stocks/%s/orders",$this->getUrl(),$order->getVenue(),$order->getSymbol());

        $response = new Response();
        try {
            $request = $this->client->post( $url, ['json' => $order->toJson()]);
            $response->parseFromJson($request->getBody());
        } catch (RequestException $e) {
            // Do some magic Things...
        }
        return $response;
    }
}
