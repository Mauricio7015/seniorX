<?php

namespace OmieLaravel\Omie\src;


use GuzzleHttp\Client;


class Connection {

    public $http;
    public $api_key;
    public $api_secret;
    public $base_url;

    public function __construct($token = null) {

        $this->base_url = 'https://platform-homologx.senior.com.br/t/senior.com.br/bridge/1.0/rest/erpx_fnd/';

        $header = [
            'Content-Type' => 'application/json'
        ];

        if ($token) {
            $header = [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ];
        }

        $this->http = new Client([
            'headers' => $header
        ]);

        return $this->http;
    }

    public function get($url, $call)
    {

        try{
            $response = $this->http->get($this->base_url . $url, $call);
            return [
                'code'     => $response->getStatusCode(),
                'response' => json_decode($response->getBody()->getContents())
            ];
        }catch (\Exception $e){

            return [
                'code'     => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }

        $response = $this->http->get($this->base_url . $url);
    }

    public function post($url, $params)
    {       
        $body = [
            'body' => json_encode($params)
        ];
        
        try{

            $response = $this->http->post($this->base_url . $url, $body);

            return [
                'code'     => $response->getStatusCode(),
                'response' => json_decode($response->getBody()->getContents())
            ];

        }catch (\Exception $e){

            return [
                'code'     => $e->getCode(),
                'response' => $e->getMessage()
            ];
            
        }
    }

    public function delete($url)
    {
        $response = $this->http->delete($this->base_url . $url);
        return json_decode($response->getBody()->getContents(), true);
    }
    
}