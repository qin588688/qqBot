<?php

namespace Qin\Qqbot\Utils;

class WebSocket
{

    public static function setJsonContent($data)
    {
        return json_encode($data);
    }

    public static function getJsonContent($data)
    {
        return json_decode($data,true);
    }

    public static function setHeartbeatText()
    {
        return static::setJsonContent([
            'op'=>1,
            'd'=>0
        ]);
    }

    public static function setSessionText($token,$intents)
    {
        return static::setJsonContent([
            'op'=>2,
            'd'=>[
                'token'=>$token,
                'intents'=>$intents,
                "shard"=>[0, 1],
                'properties'=>[]
            ]
        ]);
    }



    public static function restoreSession($token,$session_id,$seq)
    {
        return self::setJsonContent([
            'op'=>6,
            'd'=>[
                'token'=>$token,
                'session_id'=>$session_id,
                'seq'=>$seq
            ]
        ]);
    }
}