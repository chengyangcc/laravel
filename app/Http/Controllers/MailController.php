<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MailController extends Controller
{

    // public function index()
    // {
        
    //     $arr = [
    //         1 => [
    //             'id' => 1,
    //             'val' => '水果',
    //             'pid' => 0,
    //         ],
    //         2 => [
    //             'id' => 2,
    //             'val' => '蔬菜',
    //             'pid' => 0,
    //         ],
    //         3 => [
    //             'id' => 3,
    //             'val' => '苹果',
    //             'pid' => 1,
    //         ],
    //         4 => [
    //             'id' => 4,
    //             'val' => '香蕉',
    //             'pid' => 1,
    //         ],
    //         5 => [
    //             'id' => 5,
    //             'val' => '白菜',
    //             'pid' => 2,
    //         ],
    //         6 => [
    //             'id' =>6,
    //             'val' => '国产香蕉',
    //             'pid' => 4,
    //         ],
    //     ];
    //     function getlist($arr, $pid) {
    //         foreach ($arr as $val) {
    //                 if ($pid == $val['pid']) {
    //                     $a=$val['val'] . "<br/>";
    //                     print_r($a);
    //                     getlist($arr, $val['id']);
    //             }
    //         }
    //     }
    //     getlist($arr, 1);
        // $email='lan-en@163.com';
        // $this->send($email);
    // }
    // public function sendemail(){
    //     $email =  request()->email;
        
    //     $this->send($email);
        
    // }
    // public function send($email){
    //     \Mail::send('mail' , ['name'=>'张三'] ,function($message)use($email){
    //     //设置主题
    //         $message->subject("欢迎注册滕浩有限公司");
    //     //设置接收方
    //         $message->to($email);
    //     });
    // }
    public function index()
    {
        $memcache=New \Memcache;
        $memcache->connect('127.0.0.1','11211');
        // dd($memcache);
        // $memcache->set('list','滴滴滴滴','0','10');

        $data=$memcache->get('list');
        if(empty($data)){
            // echo 1;
            $data=DB::table('login')->get();
            $memcache->set('list',json_encode($data),'0','10');
        }
        dd($data);
    }
    public function send($email){
        $msg='欢迎注册饿了吗有限公司';
        \Mail::raw($msg,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
    }
}
