<?php
/**
 * Created by Server.
 * User: nanf
 * Date: 19-2-13
 * Time: 上午11:41
 */

class Server
{

    const HOST='0.0.0.0';
    const PORT='8888';
    private $ws=null;
    public function __construct()
    {


        $this->ws=new swoole_websocket_server(self::HOST,self::PORT);
        $this->ws->set([
            'enable_static_handler'=>true,
            'document_root'=>"/home/nanf/work/demo/view",
            'worker_num'=>2,
            'task_worker_num'=>2,
        ]);


       $this->ws->on('open',[$this,'onOpen']);
       $this->ws->on('message',[$this,'onMessage']);
       $this->ws->on('task',[$this,'onTask']);
       $this->ws->on('finish',[$this,'onFinish']);



       $this->ws->on('close',[$this,'onClose']);
       $this->ws->start();
    }


    public function onOpen($ws,$request){

        echo '已经开启';
    }

    public function onMessage($ws,$frame){
        echo "receive from {$frame->fd}:{$frame->data},
        opcode:{$frame->opcode},
        fin:{$frame->finish}\n
        ";

        //todo 10s
        $data=[
            'task'=>1,
            'fd'=>$frame->fd,
        ];
        $ws->task($data);
        $ws->push($frame->fd, "this is server".date('Y-m-d H:i:s'));
    }


    public function onTask($ws,$taskId,$workerId,$data){

            print_r($data);

            sleep(10);

            return 'return on finish';
    }


    public function onFinish($ws,$taskId,$data){
        echo "AsyncTask[$taskId] Finish: $data".PHP_EOL;
    }


    public function onClose($ws,$fd){
        echo "client {$fd} closed\n";
    }
}
new Server();