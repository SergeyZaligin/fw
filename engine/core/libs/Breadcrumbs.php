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
    public $breadcrumbs = [];

    public function __construct($array, $id) 
    {
        $this->breadcrumbs = $this->buildBreadcrumbs($array, $id);
    }
    
    public function buildBreadcrumbs($array, $id) 
    {
        
        if(!$id){
            return false;
        }
        
        $count = count($array);
        $br_arr = [];
        
        for ($i = 0; $i < $count; $i++) {
            if (isset($array[$id])) {
                $br_arr[$array[$id]['id']] = $array[$id]['title'];
                $id = $array[$id]['parent'];
            } else {
                break;
            }
        }
        return array_reverse($br_arr, true);
    }
    
}
