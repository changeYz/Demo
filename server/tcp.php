<?php
/**
 * Created by PhpStorm.
 * User: nanf
 * Date: 19-2-12
 * Time: 上午11:51
 */
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501);

$serv->set([
    'worker_num'=>4, //woreker_num 进程数 cpu 1-4
    'max_request'=>2000,
]);
/*
 * $fd 客户端连接唯一标识
 * $reactor_id 线程id
 * */
//监听连接进入事件
$serv->on('connect', function ($serv, $fd,$reactor_id) {
    echo "Client: Connect.成功,标识{$fd}--线程{$reactor_id}\n";
});

//监听数据接收事件
$serv->on('receive', function ($serv, $fd, $reactor_id, $data) {
    $serv->send($fd, "Server端:标识{$fd}--线程{$reactor_id}--内容$data\n");
});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.关闭\n";
});

//启动服务器
$serv->start();