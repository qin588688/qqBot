<?php

namespace Qin\Qqbot\App\Event;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;
use Qin\Qqbot\Utils\WebSocket;
use Workerman\Lib\Timer;
use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

class Client extends BaseClient
{

    /**
     * 初始化信息数量
     * @var int
     */
    protected $resetCount = 0;


    /**
     * 脚本操作参数
     * @var
     */
    protected $option;


    /**
     * 最后session_id内容
     * @var
     */
    protected $session_id;

    /**
     * 最后时间内容
     * @var
     */
    protected $lastEvent;

    /**
     * 腾讯返回最后seq
     * @var
     */
    protected $seq;


    /**
     * 需要接收的事件
     * @var
     */
    protected $intents;

    
    
    public function handel(callable $callbacks, $argv,$intents)
    {
        $this->intents = $intents;
        $scriptName = array_shift($argv);
        $action = $argv[0] ?? null;
        $this->option = $argv[1] ?? null;
        switch ($action) {
            case 'start':
            case 'stop':
                $this->execute(function ($message) use ($callbacks){
                    $callbacks($message);
                });
            default:
                echo "操作失败：请携参 start以启动\n\n调试方式启动【php start.php start】\n\n守护进程方式启动【php start.php start -d】\n\n停止服务【php start.php stop】";
                break;
        }
    }


    protected function execute(callable $callbacks)
    {
        Worker::$pidFile = dirname(getcwd()) .'/runtime/botEvent.pid';
        if ($this->option === '-d') {
            Worker::$daemonize = true;
        }
        $task = new Worker();
        $task->count = 1;
        $task->onWorkerStart = function ($worker)  use ($callbacks){
            $this->startListener(function ($message) use($callbacks) {
                $callbacks($message);
            });
        };
        $task->runAll();
    }

    protected function startListener(callable $callback)
    {
        $result = $this->httpGet(Url::Gateway);

        $con = new AsyncTcpConnection(str_replace('wss:','ws:',$result['url']));

        $con->transport = 'ssl';

        $con->onWebSocketConnect = function(AsyncTcpConnection $con) {
            echo "Connect Success!";
            Timer::add(40, function () use ($con) {
                $con->send(WebSocket::setHeartbeatText());
            });
        };

        $con->onMessage = function(AsyncTcpConnection $con, $data)  use ($callback){
            $message = WebSocket::getJsonContent($data);
            switch ($message['op']){
                case 10:
                    if ($this->resetCount === 0){
                        $con->send(WebSocket::setSessionText($this->setToken(),$this->intents));
                    }else{
                        $con->send(WebSocket::restoreSession($this->setToken(),$this->session_id,$this->seq));
                    }
                    break;
                case 0:
                    $con->send(WebSocket::setHeartbeatText());
                    $this->handleEvent($message);
                    break;
            }
            $callback($message);
        };

        $con->onError = function($connection, $code, $msg){
            echo "Connect Error: $msg\n";
        };

        $con->onClose = function($connection){
            echo "connection closed and try to reconnect\n";
            $connection->reConnect(1);
        };

        $con->connect();
    }

    public function handleEvent($message)
    {
        if ($message['t'] == 'READY'){
            $this->session_id = $message['d']['session_id'];
        }else{
            if (isset($message['d']['seq'])){
                $this->seq = $message['d']['seq'];
            }
        }
        return $message;
    }


    private function setToken()
    {
        $token = $this->app->access_token->getAppAccessToken();
        return 'QQBot '. $token['access_token'];
    }

}