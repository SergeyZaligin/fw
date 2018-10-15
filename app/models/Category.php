<?php

namespace app\models;

/**
 * Description of Category
 *
 * @author sergey
 */
class Category extends AppModel
{
    public function getAllKeysById() 
    {
        $cat =  $this->db->query("SELECT id, title, parent FROM categories", [], \PDO::FETCH_ASSOC);
        $data = [];
        foreach ($cat as $value) {
            $data[$value['id']] = $value;
        }
        return $data;
    }
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
