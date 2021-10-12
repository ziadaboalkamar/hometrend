<?php


namespace App\Http\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

class FatooraService
{
    private $base_url;
    private $headers;
    private $request_client;
    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoora_bas_url');
        $this->headers = [

            'authorization' => 'Bearer ' . env('fatoora_token'),
            'Content-Type' => 'application/json',

        ];
    }

    private function buildRequest($uri , $method , $data = []){

        $request = new Request($method, $this->base_url . $uri, $this->headers);

//if (!$data) {
//    return false;
//
//}


        $response = $this->request_client->send($request, [
            'json' => $data
        ]);

//if ($response->getStatusCode() != 200){
//    return false;
//}

        $response = json_decode($response->getBody(), true);

        return $response;
    }

    public function sendPayment($order){

        return $response = $this->buildRequest("/v2/SendPayment", "POST", $order);

    }
    public function getPaymentStatus($data){
        return $response = $this->buildRequest('/v2/getPaymentStatus', 'POST', $data);

    }
}
