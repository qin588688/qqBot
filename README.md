## 运行环境
+ PHP >= 7.0
+ [PHP OpenSSL 扩展](https://www.php.net/manual/en/book.openssl.php)
+ composer

## 安装方式

```shell
composer require qin/qqbot:"^1.0"
```



## 使用方法

```php
use Qin\Qqbot\QinBot;

$config = [
	'appId'             => '10xxxxxx',//机器人AppID
	'secret'            => '4Oxxxxxxxxxxxxxxx',//AppSecret(机器人密钥)
	'envStatus'         => false,//true为线上模式    false为沙箱模式
];
$app = QinBot::app($config);
```

## 详细文档
[https://qinbot.yingmapi.cn/](https://qinbot.yingmapi.cn/)