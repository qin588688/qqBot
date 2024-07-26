<?php

namespace Qin\Qqbot\App\Guilds\Speak;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    /**
     * 获取频道消息频率的设置详情
     * @param $guild_id
     * @return mixed
     */
    public function setting($guild_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Message_Setting,[$guild_id]));
    }

    /**
     * 频道全员禁言
     * @param $guild_id
     * @return mixed
     */
    public function allMute($data)
    {
        $save = [];
        if (isset($data['mute_end_timestamp'])){
            $save['mute_end_timestamp'] = $data['mute_end_timestamp'];
        }
        if (isset($data['mute_seconds'])){
            $save['mute_seconds'] = $data['mute_seconds'];
        }
        if (isset($data['user_ids'])){
            $save['user_ids'] = $data['user_ids'];
        }
        return $this->httpMore(vsprintf(Url::Guilds_Member_Mute,[$data['guild_id']]),$save,'PATCH');
    }

    public function muteToMembers($data)
    {
        $save = [];
        if (isset($data['mute_end_timestamp'])){
            $save['mute_end_timestamp'] = $data['mute_end_timestamp'];
        }
        if (isset($data['mute_seconds'])){
            $save['mute_seconds'] = $data['mute_seconds'];
        }
        return $this->httpMore(vsprintf(Url::Guilds_Mute_To_Member,[$data['guild_id'],$data['user_id']]),$save,'PATCH');
    }

    public function delete($guild_id,$role_id)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Roles_Update,[$guild_id,$role_id]),[],'DELETE');
    }

    /**
     * 创建频道身份组成员
     * @param $data
     * @return mixed
     */
    public function createMember($data)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Roles_Create_Member,[
            $data['guild_id'],$data['user_id'],$data['role_id']
        ]),$data['channel'],'PUT');
    }

    /**
     * 删除频道身份组成员
     * @param $data
     * @return mixed
     */

    public function deleteMember($data)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Roles_Create_Member,[
            $data['guild_id'],$data['user_id'],$data['role_id']
        ]),[],'DELETE');
    }

    /**
     * 获取子频道用户权限
     * @param $channel_id
     * @param $user_id
     * @return mixed
     */
    public function permissions($channel_id,$user_id)
    {
        return $this->httpGet(vsprintf(Url::Channels_Members_Permissions,[$channel_id,$user_id]));
    }


    /**
     * 修改子频道用户权限
     * @param $channel_id
     * @param $user_id
     * @return mixed
     */
    public function updatePermissions($data)
    {
        $save = [];
        if (isset($data['add'])){
            $save['add'] = $data['add'];
        }
        if (isset($data['remove'])){
            $save['remove'] = $data['remove'];
        }
        return $this->httpMore(vsprintf(Url::Channels_Members_Permissions,[$data['channel_id'],$data['user_id']]),$save,'PUT');
    }


    /**
     * 获取子频道身份组权限
     * @param $channel_id
     * @param $role_id
     * @return mixed
     */
    public function channelRoles($channel_id,$role_id)
    {
        return $this->httpGet(vsprintf(Url::Channels_Roles_Permissions,[$channel_id,$role_id]));
    }


    /**
     * 获取子频道身份组权限
     * @param $channel_id
     * @param $role_id
     * @return mixed
     */
    public function updateChannelRoles($data)
    {
        $save = [];
        if (isset($data['add'])){
            $save['add'] = $data['add'];
        }
        if (isset($data['remove'])){
            $save['remove'] = $data['remove'];
        }
        return $this->httpMore(vsprintf(Url::Channels_Roles_Permissions,[$data['channel_id'],$data['role_id']]),$save,'PUT');
    }
}