<?php
/**
 * Created by PhpStorm.
 * User: nanf
 * Date: 19-3-10
 * Time: 上午9:58
 */

 /*
  * 实例化table
  */

 $table=new swoole_table(1024);



 /*
  * 设置列
  */

 $table->column('id',$table::TYPE_INT,4);
 $table->column('name',$table::TYPE_STRING,64);
 $table->column('age',$table::TYPE_INT,4);


 /*
    * 创建表
    */
 $table->create();


 /*
  * 设置行名称
  */
 $table->set('cows',['id'=>1,'name'=>'nanf','age'=>'18']);


 /*
  * 获取行字段
  */




print_r($table->get('cows'));


