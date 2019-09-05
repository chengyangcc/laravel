<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function save()
    {
        // echo 123;
        return view('student/save');
    }
    public function save_do()
    {
        // echo 123;

        $data=request()->except('_token');
        // dd($data);
        $data['status']=1;
        $res =DB::table('crowd')->insert($data);
        if($res){
            return redirect('studen/index');
        }
    }
    public function index()
    {
        // echo 123;
        $status=request()->input('status');
        // dd($status);
        if($status=="" | $status==1){
            $data =DB::table('crowd')->where('status','=','1')->get();
        }
        if($status==2){
            $data =DB::table('crowd')->where('status','=','2')->get();

        }
        // dd($data);
        return view('student/index',['data'=>$data]);

    }
    public function del($id)
    {
        // echo $id;
        $data =DB::table('crowd')->where('id','=',$id)->update(['status'=>2]);
        return redirect('studen/index');
    }
    public function up($id)
    {
        // echo $id;
        $data =DB::table('crowd')->find($id);
        return view('student/up',['data'=>$data]);
    }
    public function up_do($id)
    {
        $data=request()->except('_token');
        // dd($data);
        $res =DB::table('crowd')->where('id','=',$id)->update($data);
        if($res){
            return redirect('studen/index');
        }
    }
}
