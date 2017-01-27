<?php

namespace App\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Log;

class Mediawave
{
    protected $url;
    protected $appKey;
    protected $client;

    /**
     * Mediawave constructor.
     */
    public function __construct(Client $client)
    {
        $this->urlV2 = config('services.mediawave.base_url_v2');
        $this->url = config('services.mediawave.base_url');
        $this->appKey = config('services.mediawave.app_key');
        $this->client = $client;
    }

    public function post($url, $params = [], $apiVersion = 1, $withToken=false)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }

        $apiUrl = $this->generateApiUrl($url, $apiVersion);

        try {
            $response = $this->client->post($apiUrl, [
                'form_params' => $params
            ]);
            $parsedResponse = $this->parseResponse($response);
        } catch (\Exception $e) {
            $message = 'Networking Error ';
            $code = '000';
            if ($e instanceof TransferException) {
                if ($e->hasResponse()) {
                    $response = $e->getResponse();
                    $message = $response->getReasonPhrase();
                    $code = $response->getStatusCode();
                }
                $parsedResponse = new SimpleAPIResponse($code, $message . ' at ' . $apiUrl . '.');
            } else {
                $parsedResponse = new SimpleAPIResponse(000, 'Unknown Error for ' . $apiUrl . '.');
            }
        }

        return $parsedResponse;
    }

    public function get($url, $params = [], $apiVersion = 1, $withToken = false)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }

        $apiUrl = $this->generateApiUrl($url, $apiVersion);

        Log::alert('API URL ==> ' . $apiUrl);

        try {
            $response = $this->client->get($apiUrl, [
                'query' => $params
            ]);
            $parsedResponse = $this->parseResponse($response);
        } catch (\Exception $e) {
            $message = 'Networking Error ';
            $code = '000';
            if ($e instanceof TransferException) {
                if ($e->hasResponse()) {
                    $response = $e->getResponse();
                    $message = $response->getReasonPhrase();
                    $code = $response->getStatusCode();
                }
                $parsedResponse = new SimpleAPIResponse($code, $message . ' at ' . $apiUrl . '.');
            } else {
                $parsedResponse = new SimpleAPIResponse(000, 'Unknown Error for ' . $apiUrl . '.');
            }

            Log::alert('ERROR API ==> ' . $message . ' at ' . $apiUrl);
        }

        return $parsedResponse;
    }

    private function parseResponse($response)
    {
        $body = $response->getBody();
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK

        if ($code == 200 && $reason == 'OK') {
            $result = \GuzzleHttp\json_decode($body);
            return new SimpleAPIResponse($code, $result);
        } else {
            return new SimpleAPIResponse(400, 'Bad API Result.');
        }
    }

    private function generateApiUrl($url, $version)
    {
        if ($version == 2) {
            return $this->urlV2 . $url;
        }

        return $this->url . $url;
    }


}