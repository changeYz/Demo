<?php
/**
 * Created by PhpStorm.
 * User: nanf
 * Date: 19-2-12
 * Time: 下午3:21
 */



$http = new swoole_http_server('0.0.0.0',8811);

$http->set(
    [
        'enable_static_handler'=>true,
        'document_root'=>"/home/nanf/work/demo/view",
    ]
);

$http->on('request', function ($request, $response) {
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999).'参数:'.json_encode($request->get)."</h1>");
});
$http->start();