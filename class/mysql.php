<?php
/**
 * Created by Server.
 * User: nanf
 * Date: 19-3-6
 * Time: 上午
 */

class Mysql
{
    public $dbSource=null;
    public $table=null;
    public $dbConfig=[];

    public function __construct()
    {

        $this->dbSource=new swoole_mysql();

        /*数据库配置*/
        $this->dbConfig=[
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => '',
            'database' => 'test',
            'charset' => 'utf8', //指定字符集
            'timeout' => 2,  // 可选：连接超时时间
        ];
        $this->table='cs';


    }

    public function exce($arr=null,$type=null)
    {
        $this->dbSource->connect($this->dbConfig,function ($db,$res)
        use($arr,$type)

        {

            if($res===false){
                var_dump('error');
            }
            switch ($type){
                case 'add':
                    $this->add($db,$arr);
                    break;
                case 'update':
                    $this->update($db,$arr);
                    break;
                case 'delete':
                    $this->delete($db,$arr);
                    break;
                default:
                    $this->select($db);
                    break;
            }
        });

    }

    public function select($db){

        $sql="select * from $this->table";


        $db->query($sql,function ($db,$result){
            if($result===false){
                echo 'error'.PHP_EOL;
            }else{
                var_dump($result);
            }
            $db->close();
        });
    }

    public function add($db,$arr){

        foreach ($arr as $k=>$v){
            $field[]=$v;
            $keys[]=$k;
        }

        $sql="insert into $this->table ($keys[0],$keys[1]) values ($field[0],'$field[1]')";


        $db->query($sql,function ($db,$result){
            if($result===false){
                echo 'error'.PHP_EOL;
            }else{
                var_dump($result);
            }
            $db->close();
        });
    }

    public function update($db,$arr){

        foreach ($arr as $k=>$v){
            $field[]=$v;
            $keys[]=$k;
        }

        $sql="update $this->table set $keys[1]='$field[1]' where ($keys[0]=$field[0])";

        $db->query($sql,function ($db,$result){
            if($result===false){
                echo 'error'.PHP_EOL;
            }else{
                var_dump($result);
            }
            $db->close();
        });
    }

    public function delete($db,$arr){
        foreach ($arr as $k=>$v){
            $field[]=$v;
            $keys[]=$k;
        }

        $sql="delete from $this->table  where $keys[0]=$field[0]";


        $db->query($sql,function ($db,$result){
            if($result===false){
                echo 'error'.PHP_EOL;
            }else{
                var_dump($result);
            }
            $db->close();
        });
    }

}
$obj=new Mysql();
$arr=[
    'id'=>1,
    'name'=>'nanf',
];

//foreach ($arr as $k=>$v){
//    $field[]=$v;
//    $keys[]=$k;
//}
//
//echo $keys[1].'='.$field[1].'where'.($keys[0].'='.$field[0]);

$obj->exce($arr,'update');





















/**
 * 测试垃圾
 * foreach ($arr as $k=>$v){
$field.=$v.',';
$keys.=$k.',';
}
$keys=explode(',',$keys);
$field=explode(',',$field);
$len=count($keys)-1;
unset($keys[$len],$field[$len]);
foreach ($keys as $key=>$val){
$res_k.= "\"{$val}\"".',';
}
foreach ($field as $val_f){
$res_f.= "\"{$val_f}\"".',';
}
var_dump($res_k);
//$res_k=fnSubStr($res_k);
//echo $res_k;
//echo $res_f;
//
//function fnSubStr($str){
//    return substr($str,0,mb_strlen($str)-1);
//}


//foreach ($arr as $k=>$v){
//    $field[]=$v;
//    $keys[]=$k;
//}
//var_dump($keys);
//var_dump($field);
//
//foreach ($arr as $k=>$v){
//    echo 'key=>'.$k.PHP_EOL,'value=>'.$v.PHP_EOL;
//    $field[]=$v;
//}
//var_dump($field);
//foreach ($arr as $key=>$value){
//    echo 'key=>'.$key.PHP_EOL,'value=>'.$value.PHP_EOL;
//}

//var_dump($arr[$key[0]]);
 */



