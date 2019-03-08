<?php
//第二个参数为true时，不输出TODO里的输出内容，显示会放到管道中


$Urls=[
    'www.baidu.com',
    'www.sina.cn',
    'www.google.com',
    'www.nanf.com',
    'www.5iclannad.com'
];

foreach ($Urls as $url){
    echo $url.PHP_EOL;
}

//$process = new swoole_process(function (swoole_process $pro) {
//    //todo
//
//},false);
//
//
//$pid = $process->start();
//echo $pid;
////回收子进程
//swoole_process::wait();
?>