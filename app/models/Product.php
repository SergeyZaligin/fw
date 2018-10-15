<?php

namespace app\models;


/**
 * Description of Product
 *
 * @author Sergey
 */
class Product extends AppModel
{
    
    
    public function getOneById($id) 
    {
        return $this->db->query("SELECT * FROM `products` WHERE id=:id LIMIT 1", [
            'id' => $id,
            ], \PDO::FETCH_CLASS)[0];
    }
    
    public function get() 
    {
        return $this->db->query("SELECT id, title, parent FROM categories", [], \PDO::FETCH_ASSOC);
    }
    
    public function getAllByIds($ids) 
    {
        return $this->db->query("SELECT * FROM products WHERE parent IN($ids)", [], \PDO::FETCH_CLASS);
    }
    
    public function getAll($start, $perPage) 
    {
        return $this->db->query("SELECT * FROM products LIMIT :start, :perPage", [
            'start' => $start,
            'perPage' => $perPage
        ], \PDO::FETCH_CLASS);
    }
    
    public function getAllByCategoryId($start, $perPage, $id) 
    {
        return $this->db->query("SELECT * FROM products WHERE parent = :id LIMIT :start, :perPage", [
            'start' => $start,
            'perPage' => $perPage,
            'id' => $id
        ], \PDO::FETCH_CLASS);
    }
    
    public function count(): int
    {
        return (int)$this->db->query('SELECT COUNT(*) FROM products', [], \PDO::FETCH_COLUMN)[0];
    }
    
    /**
     * Get products by id
     * 
     * @param int $id
     */
    public function getCommentsById(int $id) 
    {
        $arr = $this->db->query("SELECT * FROM `comments` WHERE comment_product=:id", [
                'id' => $id,
                ], \PDO::FETCH_ASSOC);
        $data = [];
        foreach ($arr as $value) {
            $data[$value['comment_id']] = $value;
        }
        return $data;
    }
    
}

