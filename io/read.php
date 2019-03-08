<?php

defined('ROOT') or  define('ROOT',dirname(__DIR__));
/*
 * todo:
 * 读取小文件信息（不超过4M，受限于SW_AIO_MAX_FILESIZE）
 *
 **/
//swoole_async_readfile(ROOT.'/cs',function($filename,$content){
//       echo 'name:'.$filename.PHP_EOL;
//       echo 'content:'.$content.PHP_EOL;
//});

swoole_async_read(ROOT.'/log/r',function ($filename,$content){
    echo 'name:'.$filename.PHP_EOL;
    echo 'content:'.$content.PHP_EOL;
    return true;
},1,1);








