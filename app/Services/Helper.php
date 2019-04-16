<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/4/15
 * Time: 13:51
 */

namespace App\Services;


class Helper
{
    //横向树形
    public static function _tree($arr,$pid=0,$level=0){
        static $tree = array();
        foreach ($arr as $v){
            if ($v['parent'] == $pid){
                $v['level'] = $level;
                $tree[] = $v;
                self::_tree($arr,$v['id'],$level+1);
            }
        }
        return $tree;
    }

    //树形
    public static function _tree_json($arr,$pid=0){
        $tree = array();
        foreach ($arr as $v){
            if ($pid == $v['parent']){
                $father['id'] = $v['id'];
                $father['text'] = $v['name'];
                $father['slug'] = $v['slug'];
                $father['http_method'] = $v['http_method'];
                $father['http_path'] = $v['http_path'];
                $father['parent'] = $v['parent'];
                $father['href'] = url('jurisdiction/'.$v['id']);
                $father['nodes'] = self::_tree_json($arr,$v['id']);
                $num = count($father['nodes']);
                $father['tags'] = ["$num"];
                $tree[] = $father;
            }
        }
        return $tree;
    }
}