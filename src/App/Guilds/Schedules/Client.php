<?php

namespace Qin\Qqbot\App\Guilds\Schedules;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list($channel_id)
    {
        return $this->httpGet(vsprintf(Url::Channels_Schedules_List,[$channel_id]));
    }

    public function detail($channel_id,$schedule_id)
    {
        return $this->httpGet(vsprintf(Url::Channels_Schedules_Info,[$channel_id,$schedule_id]));
    }

    public function create($data)
    {
        return $this->httpPost(vsprintf(Url::Channels_Schedules_List,[$data['channel_id']]),[
            'schedule'=>[
                'name'=>$data['name'],
                'description'=>$data['description'],
                'start_timestamp'=>$data['start_timestamp'],
                'end_timestamp'=>$data['end_timestamp'],
                'remind_type'=>$data['remind_type'],
            ]
        ]);
    }

    public function update($data)
    {
        return $this->httpMore(vsprintf(Url::Channels_Schedules_Info,[$data['channel_id'],$data['schedule_id']]),[
            'schedule'=>[
                'name'=>$data['name'],
                'description'=>$data['description'],
                'start_timestamp'=>$data['start_timestamp'],
                'end_timestamp'=>$data['end_timestamp'],
                'remind_type'=>$data['remind_type'],
            ]
        ],'PATCH');
    }

    public function delete($channel_id,$schedule_id)
    {
        return $this->httpMore(vsprintf(Url::Channels_Schedules_Info,[
            $channel_id,$schedule_id
        ]),[],'DELETE');
    }
}