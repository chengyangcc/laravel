<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{
    public function index()
    {
        $data=DB::table('news')->get();
        $rela = DB::table('relation')->where(['uid' => session('user')->u_id])->get();
        $rela = json_decode(json_encode($rela),true);
        $dianzan = array_column($rela, 'news_id');
	    foreach($data as $key=>$val){
            $v = Redis::get( $val->id);
            $data[$key]->number = empty($v) ? 0 : $v;
            $data[$key]->flag = in_array($val->id, $dianzan) ? '取消点赞' : '点赞';
        }
        return view('news/index',compact('data','session'));
    }
    public function add()
    {
        return view('news/add');
    }
    public function add_do(Request $request)
    {
        $post=$request->except(['_token']);
        $post['time']=time();
        $post['number']=0;
        $res=DB::table('news')->insert($post);
        if($res){
            return redirect('news/index');
        }
    }
    public function address($id)
    {
        $data=DB::table('news')->where(['id'=>$id])->first();
        return view('news/address',['data'=>$data]);
    }
    public function dian()
    {
        $id   = request()->input('id');
        $flag = request()->input('flag');
        $uid=request()->session()->get('user')->u_id;
        if ($flag == '点赞') {
            Redis::incr($id);
            // 新增点赞关系
            DB::table('relation')->insert(['uid' =>$uid, 'news_id' => $id]);
        } else {
            Redis::decr( $id);
            // 删除点赞关系
            DB::table('relation')->where(['uid' => $uid, 'news_id' => $id])->delete();
        }
        return Redis::get($id);
        die;
    }
    // 点赞
    // public function dianzan()
    // {
    // }
   

}
