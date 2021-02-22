<?php


namespace App\Helpers;


class DataHelpers
{
    public function data_tree($data, $parent_id = 0){
        $result = [];
        foreach($data as $item){
            if($item['parent_id'] == $parent_id){
                $result[] = $item;
                unset($data[$item['id']]);
                $child = $this->data_tree($data,$item['id']);
                $result = array_merge($result,$child);
            }
        }
        return $result;
    }
}
