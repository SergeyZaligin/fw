<?php declare(strict_types=1);

namespace engine\base;

/**
 * Base controller on core
 *
 * @author Sergey
 */
abstract class Controller 
{
    /**
     * Array routes
     * 
     * @var array
     */
    public $route;
    /**
     * Controller name
     * 
     * @var string
     */
    public $controller;
    /**
     * Model name
     * 
     * @var string 
     */
    public $model;
    /**
     * View name
     * 
     * @var string
     */
    public $view;
    /**
     * layout name
     * 
     * @var string
     */
    public $layout;
    /**
     * Prefix name
     * 
     * @var string
     */
    public $prefix;
    /**
     * Data
     * 
     * @var array
     */
    public $data = [];
    /**
     * Meta info
     * 
     * @var array
     */
    public $meta = [];
    
    /**
     * Constructor controller
     * 
     * @param array $route
     */
    public function __construct($route) 
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }
    
    /**
     * Get view
     * 
     * @return void
     */
    public function getView(): void
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }
    
    /**
     * Set data for view
     * 
     * @param mixed  $data
     * @return void
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
        
    /**
     * Check ajax 
     * 
     * @return bool
     */
    public function isAjax() 
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
    
    /**
     * For ajax
     * 
     * @param type $view
     * @param type $vars
     */
    public function loadView($view, $vars = [])
    {
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }
}
