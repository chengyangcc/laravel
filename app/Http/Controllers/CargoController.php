<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CargoController extends Controller
{
    public function cargosave()
    {
        return view('cargo/save');
    }
    public function cargosave_do()
    {
        $post=request()->except('_token');
        if(request()->hasFile('gimg')){
            $post['gimg']=files('gimg');
        }
        $post['time']=time();
        $id=DB::table('cargo')->insertGetId($post);
        if($id){
            $uid=request()->session()->get('user')->u_id;
            $data=DB::table('crjl')->insert(['uid'=>$uid,'gid'=>$id,'time'=>time(),'type'=>'入库']);
            // dd($uid);
            if($data){
                return redirect('admin/catgoindex');
            }

            
        }
    }
    public function catgoindex()
    {
        $data=DB::table('cargo')->get();

        return view('cargo/index',['data'=>$data]);
    }



    public function cargoup($id)
    {
        // echo $id;
        $data=DB::table('cargo')->find($id);
        return view('cargo/update',['data'=>$data]);
    }
    public function cargoupdate($id)
    {
        // echo $id;
        $gnumber=request()->input('gnumber');
        $data=DB::table('cargo')->where('id','=',$id)->decrement('gnumber',$gnumber);
        if($data){
            $uid=request()->session()->get('user')->u_id;
            $res=DB::table('crjl')->insert(['uid'=>$uid,'gid'=>$id,'time'=>time(),'type'=>'出库']);
            if($res){
                return redirect('admin/catgoindex');
            }
        }
    }


   
}
