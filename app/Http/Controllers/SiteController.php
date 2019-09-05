<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Validation\Rule;
class SiteController extends Controller
{
    public function site()
    {
        return view('admin/site/site');
    }
    public function site_do()
    {
        $validator=Validator::make(request()->all(), [
            's_name'=>'required|unique:site',
            's_url'=>'required|',
            
        ],[
            's_name.required'=>'不能为空',
            's_name.unique'=>'已存在',
            's_url.required'=>'不能为空',
            
        ]);
        if ($validator->fails()) {
            return redirect('admin/site')
            ->withErrors($validator)
            ->withInput();
            }
            
        $data=request()->except('_token');
        if(request()->hasFile('s_logo')){
            $data['s_logo']=files('s_logo');
        }
        $res=DB::table('site')->insert($data);
        if($res){
            return redirect('admin/site_list');
        }
    }
    public function site_list()
    {
        // echo 123;
        $query=request()->input();
        $where=[];
        $s_name=request()->get('s_name')??'';
        if($s_name){
            $where[]=['s_name','like','%'.$s_name.'%'];
        }
        $res=DB::table('site')->where($where)->paginate(3);
        return view('admin/site/site_list',compact('res','query','s_name'));

    }
    public function site_edit($sid)
    {
        $res=DB::table('site')->where('sid','=',$sid)->first();
        return view('admin/site/site_exit',['res'=>$res]);
    }
    public function site_update($sid)
    {
    $validator=Validator::make(request()->all(), [
            's_name' => [
                'required',
                Rule::unique('site')->ignore($sid,'sid'),
                ],
            's_url'=>'required|',
            
        ],[
            's_name.required'=>'不能为空',
            's_name.unique'=>'已存在',
            's_url.required'=>'不能为空',
            
        ]);
        if ($validator->fails()) {
            return redirect('admin/site_edit/'.$sid)
            ->withErrors($validator)
            ->withInput();
            }
            
        $data=request()->except('_token');
        if(request()->hasFile('s_logo')){
            $data['s_logo']=files('s_logo');
        } 
        $res=DB::table('site')->where('sid','=',$sid)->update($data);
        return redirect('admin/site_list');
    }
    public function site_del()
    {
        $sid=request()->input('sid');
        $res=DB::table('site')->where('sid',$sid)->delete();
        if($res){
            return json_encode(['ret'=>1,'msg'=>'添加成功']);die;
        }else{
            return json_encode(['ret'=>0,'msg'=>'添加失败']);die;
        }
    }
    public function only()
    {
        $s_name=request()->input('s_name');
        $res=DB::table('site')->where('s_name',$s_name)->first();
        if($res){
            echo json_encode(['ret'=>1,'msg'=>'网站名称已存在']);die;
        }
    }
   
}
