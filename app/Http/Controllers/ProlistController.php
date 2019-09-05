<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProlistController extends Controller
{
    public function prolist($cid)
    {
        $goods_name=request()->get('goods_name')??'';
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like','%'.$goods_name.'%'];
        }
        $goodscat=DB::table('admin_goods')->where(['cat_id'=>$cid])->where($where)->get();
        return view('index/goods/prolist',['goodscat'=>$goodscat,'goods_name'=>$goods_name]);    
    }
}
