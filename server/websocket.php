<?php
/**
 * Created by PhpStorm.
 * User: nanf
 * Date: 19-2-12
 * Time: 下午5:20
 */
$server = new swoole_websocket_server('0.0.0.0',8888);

$server->set(
    [
        'enable_static_handler'=>true,
        'document_root'=>"/home/nanf/work/demo/view",
    ]
);


$server->on('open',function ($server,$request){
    print_r($request->fd);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push("this is server:{$frame->data}");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();