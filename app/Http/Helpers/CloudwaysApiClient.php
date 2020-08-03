<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class CloudwaysApiClient
{
    private $client = null;
    const API_URL = "https://api.cloudways.com/api/v1";
    public $auth_key;
    public $auth_email;
    public $accessToken;
    
    public function __construct($email, $key)
    {
        $this->auth_email = $email;
        $this->auth_key = $key;
        $this->client = new \GuzzleHttp\Client();
        $this->prepare_access_token();
    }

    public function prepare_access_token()
    {
        try {
            $url = self::API_URL . "/oauth/access_token";
            $data = ['email' => $this->auth_email,'api_key' => $this->auth_key];
            $response = $this->client->post($url, ['query' => $data]);
            $result = json_decode($response->getBody()->getContents());
            $this->accessToken = $result->access_token;
        } catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
    }

    public function StatusCodeHandling($e)
    {
        if ($e->getResponse()->getStatusCode() == '400') {
            $this->prepare_access_token();
        } elseif ($e->getResponse()->getStatusCode() == '422') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '500') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '401') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '403') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } else {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
    }

    public function get_providers()
    {
		try {
            $url = self::API_URL . "/providers";
            $option = array('exceptions' => false);
            $header = array('Authorization'=>'Bearer ' . $this->accessToken);
            $response = $this->client->get($url, array('headers' => $header));
            $result = json_decode($response->getBody()->getContents());
            return $result;
        } catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
	}
	
    public function get_servers()
    {
        try {
            $url = self::API_URL . "/server";
            $option = array('exceptions' => false);
            $header = array('Authorization'=>'Bearer ' . $this->accessToken);
            $response = $this->client->get($url, array('headers' => $header));
            $result = json_decode($response->getBody()->getContents());
            return $result;
        } catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
    }
}
