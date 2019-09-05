<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
class LoginController extends Controller
{
    // 登陆
    public function login()
    {
        return view('admin/login');
    }
    // 登陆执行
    public function login_do()
    {
        $data=request()->except('_token');
        $res=DB::table('admin_user')->where('uname','=',$data['uname'])->first();
        // dd($res);
        if(!$res){
            // echo 123;
            return redirect('login');
        }else{
            $data['upwd']=md5($data['upwd']);
            if($data['upwd']!=$res->upwd){
                return redirect('login');
            }else{
                request()->session()->put('user',$res);
                return redirect('admin/index');
            }
        }
        

    }
    // 销毁session
    public function login_del()
    {
        request()->session()->put('user',null);
        return redirect('login');
    }
    // 前台登陆
    public function index()
    {
        return view('index/login');
    }
    public function index_do()
    {
        $data=request()->except('_token');
        // dd($data);
        $res=DB::table('login')->where('tel','=',$data['tel'])->first();
        // dd($res);
        if(!$res){
            // echo 123;
            return redirect('/login');
        }else{
            if($data['pwd']!=$res->pwd){
                return redirect('/login');
            }else{
                request()->session()->put('tel',$res);
                return redirect('/');
            }
        }
    }
    // 前台注册
    public function reg()
    {
        return view('index/reg');
    }
    public function reg_do()
    {
        $validator = Validator::make(request()->all(), [
    		'tel' =>['required'],
			 'pwd' => ['required'
			 ],
			 'pwds_confirmation'=>['required',"same:pwd"],//不为空,两次密码是否相同
             ],[
             	'tel.required'=>"手机号或邮箱不能为空",
                'pwd.required'=>"密码不能为空",
                'pwds_confirmation.required'=>"确认密码不能为空",
                'pwds_confirmation.same'=>'密码与确认密码不匹配',
		]);
        if($validator->fails()) {
            return redirect('/reg')
            ->withErrors($validator)
            ->withInput();
        }
        $data=request()->except('_token');
        if(session('eamil')!=$data['code']){
            echo "<script>alert('验证码错误');history.go(-1);</script>";exit;
        }
        unset($data['pwds_confirmation']);
        unset($data['code']);
        $res=DB::table('login')->insert($data);
        if($res){
            return redirect('/login');
        }
    }
    // 邮箱
    public function email()
    {
        $email=request()->input('email');
        $this->send($email);
    }
    public function send($email){
        $msg=rand('1000','9999');
        \Mail::raw($msg,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
        request()->session()->put('eamil',$msg);
    }
}
