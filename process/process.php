<?php
//第二个参数为true时，不输出TODO里的输出内容，显示会放到管道中
$process = new swoole_process(function (swoole_process $pro) {
    //todo
    //开启HTTPserver 类似在linux里运行一个PHP文件
    //exec第二个参数要为数组
    //Swoole\Process::exec() expects parameter 2 to be array
    $pro->exec('/home/nanf/work/php/bin/php',[ __DIR__.'/../server/http.php']);
},false);
$pid = $process->start();
echo $pid;
//回收子进程
swoole_process::wait();