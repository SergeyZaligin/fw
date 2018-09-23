<?php

namespace app\models;


/**
 * Description of Post
 *
 * @author Sergey
 */
class Post extends AppModel
{
    public function getAll($start, $perPage) 
    {
        return $this->db->query("SELECT * FROM test LIMIT :start, :perPage", [
            'start' => $start, 
            'perPage' => $perPage
        ], \PDO::FETCH_CLASS);
    }
    
    public function count(): int
    {
        return (int)$this->db->query('SELECT COUNT(*) FROM test', [], \PDO::FETCH_COLUMN)[0];
    }
}

