<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=request()->session()->get('user');
        $a = strtotime('9:00:00');//每天9点
        $b = strtotime('18:00:00');//每天18点
        $_now_ = strtotime('10:00:00');//当前时间
        if($_now_ >= $a && $_now_ <= $b){
            //可以通过
            if(!$user){
                return redirect('login');
               }
        }else{
            //不可以通过
            dd('当前时间段不可以访问');
        }
        
        return $next($request);
    }
}
