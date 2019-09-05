<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    public function index()
    {
        $goodscount=DB::table('admin_goods')->count();
        $goodshot=DB::table('admin_goods')->where(['is_hot'=>0])->paginate(5);
        $cate=DB::table('admin_cat')->paginate(4);
        $goods=DB::table('admin_goods')->get();
        $goodsnew=DB::table('admin_goods')->where(['is_new'=>0])->get();
        return view('index/index',['goodscount'=>$goodscount,'goodshot'=>$goodshot,'cate'=>$cate,'goods'=>$goods,'goodsnew'=>$goodsnew]);
    }
}
