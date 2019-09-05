<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
class UserController extends Controller
{
    // 练习
    public function studen()
    {
        return view('admin/studen');
    }
    public function studenadd_do()
    {
        $data=request()->except('_token');
        if(request()->hasFile('photo')){
            $data['photo']=$this->files('photo');
        }
        $res=DB::table('student')->insert($data);
        if($res){
            return redirect('studen/lists');
        }
    }
    public function files($name)
    {
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $store_result = $photo->store('', 'public');
           return $store_result;
        }
    }
    public function lists()
    {
        $page=config('app.page');

        $query=request()->input();       $name=request()->get('name')??'';
        $age=request()->get('age')??'';
        // dump($age);
        $where=[];
        if($name){
            $where[]=['name','like',$name.'%'];
        }
        if($age){
            $where[]=['age','=',$age];
        }
        $data=DB::table('student')->where($where)->paginate($page);
        return view('admin/lists',compact('data','query','name','age'));
    }
    // 后台
    public function index()
    {
        return view('admin/index');
    }
    public function main()
    {
        return view('admin/main');
    }
    public function head()
    {
        return view('admin/inc/head');
    }
    public function foot()
    {
        return view('admin/inc/foot');
    }
    public function left()
    {
        return view('admin/inc/left');
    }
    // 用户
    public function useradd()
    {
        $res=DB::table('admin_user')->get();
        return view('admin/useradd',['res'=>$res]);
    }
    public function useradd_do()
    {
        
        $validator = Validator::make(request()->all(), [
            'uname'=>'required|unique:admin_user|max:30',
            'upwd'=>'required|numeric',
        ],[
            'uname.required'=>'用户不能为空',
            'uname.unique'=>'用户名已存在',
            'upwd.required'=>'密码不能为空',
        ]);
        if ($validator->fails()){
                echo json_encode(['ret'=>0,'msg'=>$validator->errors()]);die;
        }
        $data=request()->except('_token');
        // dd($data);
        $data['upwd']=md5($data['upwd']);
        $data['utime']=time();
        $res=DB::table('admin_user')->insert($data);
        // dd($res);
        if($res){
            return json_encode(['ret'=>1,'msg'=>'添加成功']);die;
        }else{
            return json_encode(['ret'=>0,'msg'=>'添加失败']);die;
        }
    }
}
