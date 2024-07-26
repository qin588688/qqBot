<?php

namespace Qin\Qqbot\App\Guilds\Roles;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list($guild_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Roles,[$guild_id]));
    }

    public function create($guild_id,$data)
    {
        return $this->httpPost(vsprintf(Url::Guilds_Roles,[$guild_id]),$data);
    }

    public function update($guild_id,$role_id,$data)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Roles_Update,[$guild_id,$role_id]),$data,'PATCH');
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