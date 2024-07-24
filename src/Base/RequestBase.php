<?php

namespace Qin\Qqbot\Base;

class RequestBase
{

    public function getResponseContent($response)
    {

        $code = $response->getStatusCode();
        $body = $response->getBody();
        $content = self::getJsonContent($body->getContents());
        return compact('code','body','content');
    }

    public function getHeader()
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization'=> 'QQBot ' . $this->getToken()['access_token'],
            'X-Union-Appid'=> $this->config['appId']
        ];
    }


    public static function getJsonContent($data)
    {
        return json_decode($data,true);
    }
}