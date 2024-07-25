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

    public function deleteMember($data)
    {
        return $this->httpMore(vsprintf(Url::Guilds_Roles_Create_Member,[
            $data['guild_id'],$data['user_id'],$data['role_id']
        ]),[],'DELETE');
    }
}