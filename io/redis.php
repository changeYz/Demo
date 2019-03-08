<?php

$redisClient=new swoole_redis();
$redisClient->connect('127.0.0.1',6379,function ($redis,$res){
    if(!$redis){
        echo 'err-connect-redis'.PHP_EOL;
        var_dump($res);
    }else{
        echo 'succ-connect-redis'.PHP_EOL;
        $redis->set('Carle','卡尔',function($redis,$res){
            if($res){
                $redis->get('Carle',function($redis,$res){
                    var_dump($res);
                });
            }
        });

        $redis->close();

    }

});






