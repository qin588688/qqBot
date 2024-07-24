<?php

namespace Qin\Qqbot\Http;

use GuzzleHttp\Client;
use Qin\Qqbot\App\Application;
use Qin\Qqbot\Base\RequestBase;
use Qin\Qqbot\Uri\Url;

class Request extends RequestBase
{

    protected $app;

    protected $guzzleClient;
    
    protected $config;

    /**
     * Constructor.
     *
     */
    public function __construct($app)
    {
        $this->app = $app;

        $this->config = $this->app->getConfig();
        
        $this->guzzleClient = new Client([
            'verify' => false,
        ]);
    }

    public function sendGet($url)
    {
        $response = $this->guzzleClient->get(
            $this->config['http']['base_uri'] . $url,
            [
                'headers' => $this->getHeader(),
                'http_errors' => false
            ]
        );
        return $this->getResponseContent($response)['content'];
    }

    public function getToken()
    {
        $response = $this->guzzleClient->post(Url::App_Access_Token, [
            'json'=>[
                'appId' => $this->config['appId'],
                'clientSecret'=>$this->config['secret']
            ]
        ]);
        return $this->getResponseContent($response)['content'];
    }

    public static function sendPostOrOther($url,$data,$token = '',$appId = '',$method = 'POST')
    {
        $header = [
            'Content-Type: application/json'
        ];
        if ($token){
            $header = array_merge($header,[
                'Authorization: QQBot ' . $token,
                'X-Union-Appid: ' . $appId,
            ]);
        }
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST,  $method);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $header);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return $file_contents;
    }


}