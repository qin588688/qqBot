<?php

namespace Qin\Qqbot\Base;

use Qin\Qqbot\App\Application;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;

class BaseClient
{

    protected $app;

    /**
     * Constructor.
     *
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    public function httpGet($url)
    {
        return (new Request($this->app))->sendGet($url);
    }
    
    public function httpPost($url,$data)
    {
        return (new Request($this->app))->sendPost($data,$url);
    }
    
    public function httpMore($url,$data = [],$method = 'POST')
    {
        return (new Request($this->app))->moreMethod($data,$url,$method);
    }
}