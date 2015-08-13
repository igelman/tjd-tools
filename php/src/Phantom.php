<?php
/**
 * Created by PhpStorm.
 * User: igelman
 * Date: 8/13/15
 * Time: 12:17 AM
 */
require '../vendor/autoload.php';
use JonnyW\PhantomJs\Client;

class Phantom {

    function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function getResponseHtml() {
        $this->sendRequest();
        return $this->content;
    }

    private function sendRequest() {
        $client = Client::getInstance();
        $request = $client->getMessageFactory()->createRequest($this->url);
        $response = $client->getMessageFactory()->createResponse();
        $client->send($request, $response);

        $this->content = NULL;
        $this->status = $response->getStatus();
        if ($this->status === 200) {
            $this->content = $response->getContent();
        }


    }


}