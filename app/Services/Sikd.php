<?php

namespace App\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Sikd
{
    protected $url;
    protected $appKey;
    protected $client;

    /**
     * Sikd constructor.
     */
    public function __construct(Client $client)
    {
        $this->urlV2 = config('services.sikd.base_url_v2');
        $this->url = config('services.sikd.base_url');
        $this->appKey = config('services.sikd.app_key');
        $this->clientId = config('services.sikd.client_id');
        $this->clientSecret = config('services.sikd.client_secret');
        $this->client = $client;
    }

    public function getAccessToken($username, $password)
    {
        $params = [
            'grant_type' => 'password',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'username' => $username,
            'password' => $password
        ];

        $tokenResult = $this->post('oauth/token', $params);

        return $tokenResult;
    }

    public function post($url, $params = [], $apiVersion = 1, $withToken=true)
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
            $parsedResponse = $this->proceedException($e, $apiUrl);
        }

        return $parsedResponse;
    }

    public function get($url, $apiVersion = 1, $withToken = true, $cached = false)
    {
        // days * hours * minutes
        $minutes = 0 * 0 * 60;
        $flatUrl = str_replace('/', '_', $url);
        $flatUrl = str_replace('-', '_', $flatUrl);

        $headers = [];

        if ($withToken) {
            $accessToken = session('api_token');
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken
            ];
        }

        if ($cached) {
            $parsedResponse = Cache::remember($flatUrl, $minutes, function () use ($url, $apiVersion, $headers) {
                $apiUrl = $this->generateApiUrl($url, $apiVersion);
                // Log::alert('API URL ==> ' . $apiUrl);

                try {
                    $request = new Request('GET', $apiUrl, $headers);
                    $response = $this->client->send($request);
                    $parsedResponse = $this->parseResponse($response);
                } catch (\Exception $e) {
                    $parsedResponse = $this->proceedException($e, $apiUrl);
                }

                return $parsedResponse;
            });
        } else {
            $apiUrl = $this->generateApiUrl($url, $apiVersion);
            // Log::alert('API URL ==> ' . $apiUrl);

            try {
                $request = new Request('GET', $apiUrl, $headers);
                $response = $this->client->send($request);
                $parsedResponse = $this->parseResponse($response);
            } catch (\Exception $e) {
                $parsedResponse = $this->proceedException($e, $apiUrl);
            }
        }


        return $parsedResponse;
    }

    public function put($url, $params, $apiVersion = 1)
    {
        $apiUrl = $this->generateApiUrl($url, $apiVersion);

        $accessToken = session('api_token');
        $headers = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken
            ],
            'body' => $params
        ];

        try {
            $request = new Request('PUT', $apiUrl, $headers);
            $response = $this->client->send($request);
            $parsedResponse = $this->parseResponse($response);
        } catch (\Exception $e) {
            $parsedResponse = $this->proceedException($e, $apiUrl);
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
        } elseif ($code == 401) {
            \Auth::logout();
            session()->flush();
            return new SimpleAPIResponse(401, 'Unauthorized');
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

    private function proceedException($e, $apiUrl)
    {
        $message = 'Unknown Error';
        $code = '000';
        if ($e instanceof TransferException) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $message = $response->getReasonPhrase();
                $code = $response->getStatusCode();
            }
        }
        Log::alert('ERROR API ==> ' . $message . ' at ' . $apiUrl);

        return new SimpleAPIResponse($code, $message . ' at ' . $apiUrl . '.');
    }

    public function getJsonResult($url, $cache = true)
    {
        $request = $this->get($url, 1, true, $cache);
        $result = ($request->status == '200') ? $request->result : [];

        return \GuzzleHttp\json_encode($result);
    }

    public function getAvailableYears()
    {
        $years = [];
        $start = 2015;
        $thisYear = date('Y');
        while ($start <= $thisYear) {
            $years[] = $start;
            $start++;
        }

        return $years;
    }


}