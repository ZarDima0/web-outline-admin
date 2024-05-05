<?php

namespace App\ClientOutline;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class Call
{
    const LIST_KEY = '/access-keys';
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUsersKeyList(Collection $urlsList): array
    {
        $result = [];
        foreach ($urlsList as $url) {
            $body = $this->client->get($url . self::LIST_KEY)->getBody();
            $resultArray = json_decode($body->getContents(), true);
            $result[] = $resultArray['accessKeys'];
        }
        return $result;
    }

    public function createKey(Collection $urlsList): array
    {
        $result = [];
        foreach ($urlsList as $url) {
            $body = $this->client->get($url . self::LIST_KEY)->getBody();
            $resultArray = json_decode($body->getContents(), true);
            $result[] = $resultArray['accessKeys'];
        }
        return $result;
    }
}
