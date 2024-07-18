<?php

namespace Ahmand\CheckHost;

use GuzzleHttp\ClientInterface;

class CheckHost
{
    private $client;
    private $request_id;
    function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function PingCheck($host)
    {
        $Request = $this->client->request('GET', Uri::PING . '?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        $this->request_id = json_decode($Request->getBody())->request_id;
        return $Request->getBody();
    }
    public function HTTPCheck($host)
    {
        $Request = $this->client->request('GET', Uri::HTTP . '?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        $this->request_id = json_decode($Request->getBody())->request_id;
        return $Request->getBody();
    }

    public function TCPCheck($host)
    {
        $Request = $this->client->request('GET', Uri::TCP . '?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        $this->request_id = json_decode($Request->getBody())->request_id;
        return $Request->getBody();
    }

    public function DNSCheck($host)
    {
        $Request = $this->client->request('GET', Uri::DNS . '?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        $this->request_id = json_decode($Request->getBody())->request_id;
        return $Request->getBody();
    }
    public function Nodes($type=null)
    {
        switch ($type) {
            case 'ip':
                $uri = Uri::NODES[0];
                break;
            default:
                $uri = Uri::NODES[1];
        }
        $Request = $this->client->request('GET', $uri, ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }
    public function CheckResult()
    {
        sleep(10);
        $Request = $this->client->request('GET', Uri::RESULT . "/$this->request_id", ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }
}
