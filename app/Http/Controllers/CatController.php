<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CatController extends Controller
{
    public function category()
    {
        $data=DB::table('admin_cat')->get();
        $data=CreateTree($data);
        return view('admin/category/category',['data'=>$data]);
    } 
    public function category_do()
    {
        $data=request()->except('_token');
        $res=DB::table('admin_cat')->insert($data);
        if($res){
            return redirect('admin/category_list');
        }
    }
    public function category_list()
    {
        $data=DB::table('admin_cat')->get();
        $data=CreateTree($data);
        return view('admin/category/category_list',['data'=>$data]);
    }
   
    
}
