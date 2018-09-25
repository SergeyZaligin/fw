<?php

namespace app\widgets\menu\model;

use app\models\AppModel;
/**
 * Description of Menu
 *
 * @author Sergey
 */
class Menu extends AppModel
{

    public function getAll($table) 
    {
        return $this->db->query("SELECT * FROM {$table}",[]);
    }

}
