<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admin_goods;
use Validator;
class GoodsController extends Controller
{
    public function goods()
    {
        $admin_cat=DB::table('admin_cat')->get();
        $admin_cat=CreateTree($admin_cat);
        $brand=DB::table('brand')->get();
      //  dd($admin_cat);
        return view('admin/goods/goods_add',['admin_cat'=>$admin_cat,'brand'=>$brand]);
    }
    public function goods_do()
    {
        $validator=Validator::make(request()->all(), [
            'goods_name'=>'required|max:30',
            'shop_price'=>'required|numeric',
            'goods_number'=>'required|numeric',
            'brand_id'=>'required',
            'cat_id'=>'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'shop_price.required'=>'价格不能为空',
            'shop_price.numeric'=>'输入必须位数字',
            'goods_number.required'=>'数量不能为空',
            'goods_number.numeric'=>'输入必须位数字',
            'brand_id.required'=>'品牌必选',
            'cat_id.required'=>'分类必选',
        ]);
        if ($validator->fails()) {
            return redirect('admin/goods')
            ->withErrors($validator)
            ->withInput();
            }
        $data=request()->except('_token');
        $data['goods_sn']=$data['goods_sn'].time().rand('1000','9999');
        if(request()->hasFile('goods_img')){
            $data['goods_img']=$this->files('goods_img');
        }
        $data['goods_time']=time();
        $res=Admin_goods::insert($data);
        if($res){
            return redirect('admin/goods_list');
        }
    }
    // 上传图片的方法
    public function files($name)
    {
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $store_result = $photo->store('', 'public');
           return $store_result;
        }
    }
    // 商品展示
    public function goods_list()
    {
        
        $query=request()->input();
        $where=[];
        $goods_name=request()->get('goods_name')??'';
        $cat_id=request()->get('cat_id')??'';
        $brand_id=request()->get('brand_id')??'';
        $is_on_sale=request()->get('is_on_sale')??'';
        if($goods_name){
            $where[]=['goods_name','like','%'.$goods_name.'%'];
        }
        if($cat_id){
            $where[]=['cat_id','=',$cat_id];
        }
        if($brand_id){
            $where[]=['brand_id','=',$brand_id];
        }
        if($is_on_sale){
            $where[]=['is_on_sale','=',$is_on_sale];
        }
        $admin_cat=DB::table('admin_cat')->get();
        $admin_cat=CreateTree($admin_cat);
        $brand=DB::table('brand')->get();
        $goods_data=Admin_goods::join('admin_cat','admin_goods.cat_id','=','admin_cat.cid')->join('brand','admin_goods.brand_id','=','brand.brand_id')->where($where)->paginate('2');
        return view('admin/goods/goods_list',compact('goods_data','admin_cat','brand','query','goods_name','is_on_sale','brand_id','cat_id'));
    }
    // 修改
    public function goods_edit($gid)
    {
        $goods_data=Admin_goods::find($gid);
        $admin_cat=DB::table('admin_cat')->get();
        $admin_cat=CreateTree($admin_cat);
        $brand=DB::table('brand')->get();
        return view('admin/goods/goods_edit',['goods_data'=>$goods_data,'admin_cat'=>$admin_cat,'brand'=>$brand]);
    }
    public function goods_update($gid)
    {
        $validator=Validator::make(request()->all(), [
            'goods_name'=>'required|max:30',
            'shop_price'=>'required|numeric',
            'goods_number'=>'required|numeric',
            'brand_id'=>'required',
            'cat_id'=>'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'shop_price.required'=>'价格不能为空',
            'shop_price.numeric'=>'输入必须位数字',
            'goods_number.required'=>'数量不能为空',
            'goods_number.numeric'=>'输入必须位数字',
            'brand_id.required'=>'品牌必选',
            'cat_id.required'=>'分类必选',
        ]);
        if ($validator->fails()) {
            return redirect('admin/goods_edit/'.$gid)
            ->withErrors($validator)
            ->withInput();
            }
        $data=request()->except('_token');
        if(request()->hasFile('goods_img')){
            $data['goods_img']=$this->files('goods_img');
        }
        $data['goods_sn']=$data['goods_sn'];
        $res=Admin_goods::where('gid','=',$gid)->update($data);
        return redirect('admin/goods_list');
    }
    public function goods_delete(){
        $gid=request()->input('gid');
        $res=Admin_goods::where('gid',$gid)->delete();
        // return redirect('admin/goods_list');
        if($res){
            return json_encode(['ret'=>1,'msg'=>'添加成功']);die;
        }else{
            return json_encode(['ret'=>0,'msg'=>'添加失败']);die;
        }
    }
    // 前台展示
    public function goodslist()
    {
        echo 123;
    } 
    
}
