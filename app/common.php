<?php
function CreateTree($data,$parent_id=0,$level=1){
    //1.定义一个容器（新数组）
    static $new_arr=[];
    //2.遍历数据一条条显示
        foreach($data as $k=>$v){
            //3.parent_id=0的
            if($v->parent_id==$parent_id){
                //添加level字段用来区分级别
                $v->level=$level;
                //4.找到之后放到新数组里
                $new_arr[]=$v;
                //调用程序自身找子集
                CreateTree($data,$v->cid,$level+1);
            }
        }
        return $new_arr;
    }
    function CreateTreeson($data,$parent_id=0){
        //1.定义一个容器（新数组）
        $new_arr=[];
        //2.遍历数据一条条显示
        foreach($data as $k=>$v){
            //3.parent_id=0的
            if($v->parent_id==$parent_id){
                //4.找到之后放到新数组里
                $new_arr[$k]=$v;
                //调用程序自身找子集
                $new_arr[$k]->son = CreateTreeson($data,$v->cid);
            }
        }
        return $new_arr;
    }
    function files($name)
    {
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $store_result = $photo->store('', 'public');
           return $store_result;
        }
    }