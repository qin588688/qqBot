<?php

namespace Qin\Qqbot\App\Guilds;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    /**
     * 频道列表
     * @return mixed
     */
    public function list()
    {
        return $this->httpGet(Url::Me_Guilds);
    }


    /**
     * 频道详情
     * @return mixed
     */
    public function detail($guilds_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Info,[$guilds_id]));
    }
    

    public function getUrl()
    {
        return Url::Gateway;
    }

    /**
     * 获取用户（机器人）详情
     */
    public function user()
    {
        return $this->httpGet(Url::Guilds_Bot_Info); 
    }

    /**
     * 获取子频道列表
     * @param $guilds_id
     * @return mixed
     */
    public function channels($guilds_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Channels,[$guilds_id]));
    }

    /**
     * 获取子频道详情
     * @param $guilds_id
     * @return mixed
     */
    public function channelsDetail($channel_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Channels_Info,[$channel_id]));
    }

    /**
     * 创建子频道
     * @param $data
     * @return mixed
     */
    public function createChannel($data)
    {
        $keys = ['parent_id', 'private_type', 'private_user_ids', 'speak_permission', 'application_id'];
        $saveData = [
            'name'=>$data['name'],
            'type'=>$data['type'],
            'sub_type'=>$data['sub_type'],
            'position'=>$data['position'],
        ];
        $saveData += array_filter($data, function($key) use ($keys) {
            return in_array($key, $keys);
        }, ARRAY_FILTER_USE_KEY);
        return $this->httpPost(vsprintf(Url::Guilds_Channels,[$data['guild_id']]),$saveData);
    }

    /**
     * 更改子频道
     * @param $data
     * @return mixed
     */
    public function updateChannel($data)
    {
        $keys = ['parent_id', 'private_type', 'speak_permission','name','position'];
        $saveData = [];
        $saveData += array_filter($data, function($key) use ($keys) {
            return in_array($key, $keys);
        }, ARRAY_FILTER_USE_KEY);
        return $this->httpMore(vsprintf(Url::Guilds_Channels_Info,[$data['channel_id']]),$saveData,'PATCH');
    }

    /**
     * 删除子频道
     * @param $channel_id
     * @return mixed
     */
    public function deleteChannel($channel_id)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Channels_Info,[$channel_id]),[],'DELETE');
    }
}