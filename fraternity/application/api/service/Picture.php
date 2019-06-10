<?php

namespace app\api\service;
use \think\Db;
use app\api\model\Picture as PictureModel;


class Picture
{
    public static function getRandTable(){
        $num = 20;    //需要抽取的默认条数
        $table = 'picture';    //需要抽取的数据表
        $countcus = Db::name($table)->max('id');    //获取总记录数
        $min = Db::name($table)->min('id');    //统计某个字段最小数据
        if($countcus < $num){$num = $countcus;}
        $i = 1;
        $flag = 0;
        $ary = array();
        while($i<=$num){
            $rundnum = rand($min, $countcus);//抽取随机数
            // if($flag != $rundnum){
            //     //过滤重复 
            //     if(!in_array($rundnum,$ary)){
            $ary[] = $rundnum;
            //         $flag = $rundnum;
            //     }else{
            //         $i--;
            //     }
            //     $i++;
            // }
            $i++;
        }
        $list = Db::name($table)->where('id','in',$ary,'or')->select();
        return $list;
    }

    public static function getPicture()
    { 
        return self::getRandTable();
    }
}