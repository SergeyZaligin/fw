<?php

namespace app\models;

/**
 * Description of Category
 *
 * @author sergey
 */
class Category extends AppModel
{
    
    public function categoriesId(array $array, int $id): string
    {
        
        if(!$id){
            return false;
        }
        
        $data = '';
        
        foreach ($array as $item) {
            if ($item['parent'] === (int)$id) {
                $data .= $item['id'] . ',';
                $data .= $this->categoriesId($array, $item['id']);
            }
        }
        
        return (string)$data;
    }
}
