<?php

namespace App\Libs;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

use Illuminate\Support\Facades\Log;

class Transport
{
    /**
     * @var string
     */
    protected $method = '';

    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * @var string
     */
    protected $resource = '';

    /**
     * @var array
     */
    protected $payload = [];

    /**
     * @param string $method
     * @param string $resource
     * @param array  $payload
     *
     * @return array
     */

    public function request($method, $baseUrl, $resource, $payload = [])
    {
        $this->method = $method;
        $this->baseUrl = $baseUrl;
        $this->resource = $resource;

        $this->payload = $this->method == 'POST' ? ['form_params' => $payload]
            : ['query' => $payload];

        return $this->parse($this->fetch());
    }


    /**
     * @return string
     */
    protected function fetch()
    {
        try {
            return (new Client)->request(
                $this->method,
                $this->baseUrl . $this->resource,
                $this->payload
            );
        } catch (\Exception $exception) {
            Log::error('Service Internal Error: ' . $exception->getMessage());
        }
    }

    /**
     * @param string $response
     *
     * @return array
     */
    protected function parse($response)
    {
        $body = $response->getBody();
        $result = $body->getContents();
        return $result;
    }
}
