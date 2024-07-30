<?php

namespace Qin\Qqbot\Uri;

class Url
{
    
    const QQ_Com = 'https://api.sgroup.qq.com/';
    
    const QQ_Com_Sandbox = 'https://sandbox.api.sgroup.qq.com/';

    const App_Access_Token = 'https://bots.qq.com/app/getAppAccessToken';

    const Channel_Guilds_Members = '/guilds/%s/members';

    const Api_Authentication = 'https://api.sgroup.qq.com';

    const Me_Guilds = 'users/@me/guilds';

    const Guilds_Info = 'guilds/%s';

    const Guilds_Bot_Info = 'users/@me';
    
    const Guilds_Bot_Permission = 'guilds/%s/api_permission';
    
    const Guilds_Bot_Permission_Demand = 'guilds/%s/api_permission/demand';

    const Guilds_Roles = 'guilds/%s/roles';

    const Guilds_Roles_Create = 'guilds/%s/roles';
    
    const Guilds_Roles_Create_Member = 'guilds/%s/members/%s/roles/%s';

    const Guilds_Roles_Update = 'guilds/%s/roles/%s';
    
    const Guilds_Roles_Delete = 'guilds/%s/roles/%s';

    const Guilds_Member_List = 'guilds/%s/members?limit=%s&after=%s';
    
    const Guilds_Member_Info = 'guilds/%s/members/%s';

    const Guilds_Member_Mute = 'guilds/%s/mute';
    
    const Guilds_Member_Roles = 'guilds/%s/roles/%s/members?start_index=%s&limit=%s';

    const Guilds_Member_Delete = 'guilds/%s/members/%s';

    const Guilds_Mute_To_Member = 'guilds/%s/members/%s/mute';

    const Announces_Create = 'guilds/%s/announces';

    const Announces_Delete = 'guilds/%s/announces/%s';

    const Gateway = 'gateway';

    const Guilds_Channels = 'guilds/%s/channels';

    const Guilds_Channels_Info = 'channels/%s';

    const Guilds_Channels_Threads = 'channels/%s/threads';
    
    const Guilds_Channels_Member_Online_Nums = 'channels/%s/online_nums';

    const Message_To_Users = 'v2/users/%s/messages';

    const Message_To_Groups = 'v2/groups/%s/messages';

    const Message_To_Channels = 'channels/%s/messages';

    const Message_By_Channels_Withdraw = 'channels/%s/messages/%s?hidetip=false';

    const Channels_Members_Permissions = 'channels/%s/members/%s/permissions';
    
    const Channels_Roles_Permissions = 'channels/%s/roles/%s/permissions';

    const Guilds_Message_Setting = 'guilds/%s/message/setting';
    
    const Channels_Pins = 'channels/%s/pins/%s';
    
    const Channels_Pins_List = 'channels/%s/pins';

    const Channels_Schedules_List = 'channels/%s/schedules';

    const Channels_Schedules_Info = 'channels/%s/schedules/%s';
}