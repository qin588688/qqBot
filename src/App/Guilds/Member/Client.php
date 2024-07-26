<?php

namespace Qin\Qqbot\App\Guilds\Member;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list($guild_id,$limit = 15,$after = 0)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Member_List,[$guild_id,$limit,$after]));
    }

    public function guildsMemberInfo($guild_id,$user_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Member_Info,[$guild_id,$user_id]));
    }

    public function channelsOnlineNums($channel_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Channels_Member_Online_Nums,[$channel_id]));
    }

    public function rolesMembers($guild_id,$role_id,$start_index = 0,$limit = 15)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Member_Roles,[$guild_id,$role_id,$start_index,$limit]));
    }

    public function deleteMember($data)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Member_Delete,[
            $data['guild_id'],$data['user_id']
        ]),['add_blacklist'=>$data['add_blacklist'],'delete_history_msg_days'=>$data['delete_history_msg_days']],'DELETE');
    }
}