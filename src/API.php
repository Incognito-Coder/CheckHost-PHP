<?php

namespace Ahmand\CheckHost;

use GuzzleHttp\ClientInterface;

class CheckHost
{
    private $client;
    function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function PingCheck($host)
    {
        $Request = $this->client->request('GET', 'https://check-host.net/check-ping?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        return array(
            'full' => $Request->getBody(),
            'id' => json_decode($Request->getBody())->request_id
        );
    }
    public function HTTPCheck($host)
    {
        $Request = $this->client->request('GET', 'https://check-host.net/check-http?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }

    public function TCPCheck($host)
    {
        $Request = $this->client->request('GET', 'https://check-host.net/check-tcp?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }

    public function DNSCheck($host)
    {
        $Request = $this->client->request('GET', 'https://check-host.net/check-dns?host=' . $host, ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }
    public function Nodes($type)
    {
        switch ($type) {
            case 'ip':
                $uri = 'https://check-host.net/nodes/ips';
                break;
            default:
                $uri = 'https://check-host.net/nodes/hosts';
        }
        $Request = $this->client->request('GET', $uri, ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }
    public function CheckResult($id)
    {
        $Request = $this->client->request('GET', "https://check-host.net/check-result/$id", ['headers' => ['Accept' => 'application/json']]);
        return $Request->getBody();
    }
}
