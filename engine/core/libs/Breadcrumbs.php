<?php

namespace engine\libs;

/**
 * Description of Breadcrumbs
 *
 * @author sergey
 */
class Breadcrumbs 
{
    public $id;
    public $data = [];
    public $breadcrumbsData = [];

    public function __construct($array, $id) 
    {
        $this->id = (int)$id;
        $this->data = $array;
        
        $this->breadcrumbsData = $this->breadcrumbs($array, $id);
    }
    
    public function breadcrumbs($array, $id) 
    {
        
    }
}
