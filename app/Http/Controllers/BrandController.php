<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BrandController extends Controller
{
    public function brand()
    {
        return view('admin/brand/brand_add');
    }
    public function brand_do()
    {
        request()->validate([
            'brand_name' => 'required|unique:brand|max:50',
            'brand_url' => 'required',
            'brand_order' => 'required|numeric',
            'brand_desc' => 'required',
        ],[
            'brand_name.required'=>'品牌不能为空',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.max'=>'品牌名称最大不能超过50',
            'brand_url.required'=>'品牌网址必填',
            'brand_order.required'=>'排序必填',
            'brand_order.numeric'=>'排序必须是数字',
            'brand_desc.required'=>'描述必填',
        ]);
        $post=request()->except('_token');
        // dd($post);
        //判断有文件上传
        if(request()->hasFile('brand_logo')){
            //调用公共方法的文件上传
            $post['brand_logo'] = files('brand_logo');
        }
        // dd($post);
        $stu = DB::table('brand')->insert($post);
        if($stu){
            return redirect("admin/brand_list");
        }
    }
    public function brand_list()
    {
        //接收列表传的搜索数据
        $query = Request()->input();
        // dd($query);
        $brand_name=$query['brand_name']??"";
        $is_show=$query['is_show']??"";
        $where=[];
        if($brand_name){
            $where[]=['brand_name','like','%'.$brand_name.'%'];
        }
        if($is_show || $is_show==='0'){
            $where[]=['is_show','=',$is_show];
        }
        $data=DB::table('brand')->where($where)->orderby('brand_order','desc')->paginate('2');
        return view('admin/brand/brand_list',compact(['data','brand_name','is_show']));
    }
    
}
