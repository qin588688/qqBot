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
                'clientSecret'=>$this->config['secret'],
                'http_errors' => false
            ]
        ]);
        return $this->getResponseContent($response)['content'];
    }

    public function sendPost($data,$url)
    {
        $response = $this->guzzleClient->post(
            $this->config['http']['base_uri'] . $url, [
            'headers' => $this->getHeader(),
            'json'=>$data,
            'http_errors' => false
        ]);
        return $this->getResponseContent($response)['content'];
    }

    public function moreMethod($data,$url,$method)
    {
        $sendData = [
            'headers' => $this->getHeader(),
            'http_errors' => false
        ];
        if(count($data) > 0){
            $sendData = array_merge(['json'=>$data],$sendData);
        }
        if ($method == 'PATCH'){
            $response = $this->guzzleClient->patch(
                $this->config['http']['base_uri'] . $url, $sendData);
        }else if ($method == 'DELETE'){
            $response = $this->guzzleClient->delete(
                $this->config['http']['base_uri'] . $url, $sendData);
        }else if ($method == 'PUT'){
            $response = $this->guzzleClient->put(
                $this->config['http']['base_uri'] . $url, $sendData);
        }
        return $this->getResponseContent($response)['content'];
    }
}