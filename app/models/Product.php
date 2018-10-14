<?php

namespace app\models;


/**
 * Description of Product
 *
 * @author Sergey
 */
class Product extends AppModel
{
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
}

