<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Admin_goods;
class ProinfoController extends Controller
{
    public function proinfo_index($gid)
    {
        // echo $gid;
        $data=Admin_goods::find($gid);
        return view('index/goods/proinfo',['data'=>$data]);
    }
}