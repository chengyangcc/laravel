<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GarController extends Controller
{
    public function car_index()
    {
        $gid=request()->input('gid');
        $buy_number=request()->input('buy_number');
             $data=DB::table('buy')->find($gid);
             if($data['goods_number']<$buy_number)
             {
                 // 大于输出json格式数组
                 return json_encode(['ret'=>2,'mag'=>'库存不足']);die;
             }
            $where=[
                'gid'=>$gid,
                'l_id'=>session('list')['l_id'],
            ];
             // 根据id查询数据库取出这条数据
             $buydata=DB::table('buy')->find($gid);
             // 判断从数据库取出的库存是否小于买的数量
             if($buydata)
            {
                // 存在数据的购买商品数量加一
                $buydata['buy_number']+=$buy_number;
                $buydata['b_time']=time();
                if($data['goods_number']<$buydata['buy_number'])
                {
                    // 大于输出json格式数组
                    echo json_encode(['ret'=>2,'mag'=>'库存不足']);die;
                }
                $res=DB::table('buy')->where($where)->update($buydata->toArray());
            }else{
                // 定义数组
                $array=[
                    'gid'=>$gid,
                    'shop_price'=>$data['shop_price'],
                    'goods_img'=>$data['goods_img'],
                    'buy_number'=>$buy_number,
                    'goods_name'=>$data['goods_name'],
                    'l_id'=>session('list')['l_id'],
                    'b_time'=>time(),
                ];
                $res=DB::table('buy')->insert($array);
            }
            if($res){
                echo json_encode(['ret'=>1,'mag'=>'添加成功']);die;
            }
        
    }
}
