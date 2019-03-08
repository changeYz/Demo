<?php
/**
 * Created by PhpStorm.
 * User: nanf
 * Date: 19-2-12
 * Time: 下午2:33
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);
if(!$client->connect('127.0.0.1',9501)){
    echo '连接失败';
    exit;
}

//输入数据
fwrite(STDOUT,'请输入消息：');
$msg= trim(fgets(STDIN));
//将数据发送服务端
$client->send($msg);
//接受返回结果
$result =$client->recv();
echo $result;