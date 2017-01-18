<?php

namespace App\Service;


use GuzzleHttp\Client;

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
        $this->url = config('services.mediawave.base_url');
        $this->appKey = config('services.mediawave.app_key');
        $this->client = $client;
    }

    public function post($url, $params, $withToken=false)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }

        $apiUrl = $this->url . $url;

        $response = $this->client->post($apiUrl, [
            'form_params' => $params
        ]);

        $parsedResponse = $this->parseResponse($response);

        return $parsedResponse;
    }

    public function get($url, $params, $withToken = false)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }

        $apiUrl = $this->url . $url;

        $response = $this->client->get($apiUrl, [
            'query' => $params
        ]);

        $parsedResponse = $this->parseResponse($response);

        return $parsedResponse;
    }

    private function parseResponse($response)
    {
        $body = $response->getBody();
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK

        if ($code == 200 && $reason == 'OK') {
            $response = \GuzzleHttp\json_decode($body);
        } else {
            return redirect('/logout')->withErrors(['session_expired' => 'Invalid Request.']);
        }

        return $response;
    }


}