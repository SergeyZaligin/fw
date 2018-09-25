<?php

namespace app\widgets\menu;

use engine\Cache;
use app\widgets\menu\model\Menu;

class MenuCategory
{

    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cacheKey = 'fw_menu';

    public function __construct($options = []){
        $this->tpl = WIDGETS . '/menu/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function output(){
        echo "<{$this->container} class='{$this->class}'>";
            echo (string)$this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function run(){
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml) {
            $menuModel = new Menu();
            $this->data = $menuModel->getAll($this->table);
            foreach ($this->data as $value) {
                $data[$value['id']] = $value;
            }
            $this->data = $data;
            
            $this->tree = $this->getTree();
            //debug($this->tree);
            //die;
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
        }
        $this->output();
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}