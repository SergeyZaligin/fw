<?php declare(strict_types=1);

namespace engine\libs;

use engine\App;

/**
 * Description of Upload
 *
 * @author Sergey
 */
class Upload 
{
    /**
     * Name file
     * 
     * @var string
     */
    public $name;
    /**
     * Path store server
     * 
     * @var string 
     */
    public $tmp_name;
    /**
     * Type file
     * 
     * @var string
     */
    protected $type;
    /**
     * Size file
     * 
     * @var int
     */
    protected $size;
    /**
     * 
     * @var array
     */
    protected $blacklist = [".php", ".phtml", ".php3", ".php4", ".html", ".htm"];
    
    private $valid = false;
    
    public $extension;
    public $filename;
    public $pathFile;
    public $buildFile;
    
    /**
     * Input name
     * 
     * @param string $fileName
     */
    public function __construct(string $fileName) 
    {
        $this->name     = App::$app->request->files[$fileName]['name'];
        $this->tmp_name = App::$app->request->files[$fileName]['tmp_name'];
        $this->type     = App::$app->request->files[$fileName]['type'];
        $this->size     = App::$app->request->files[$fileName]['size'];
        
        $this->isValid();
        
        if ($this->valid) {
            $this->extension = pathinfo($this->name);
            $this->filename = basename($this->name, '.' . $this->extension['extension']);
            
            $this->buildFile = $this->filename . (string) rand(10000000, 99999999) . '.' . $this->extension['extension'];
            $this->pathFile = "uploads/logos/" . $this->buildFile;
            
            //debug($this->pathFile);
            //die('Good');
        }else{
            throw new \Exception("Неверный формат файла изображения", 500);
        }
    }
    
    public function getPath() 
    {
        return $this->pathFile;
    }
    
    public function uploadsFile() 
    {
        move_uploaded_file($this->tmp_name, UPLOADS . "/logos/{$this->buildFile}");
    }
    
    private function isValid() 
    {
        foreach ($this->blacklist as $item) {
            if ( (preg_match("/$item\$/i", $this->name)) || (($this->type != "image/jpg") && ($this->type != "image/jpeg")) || ($this->size > 102400) ) {
                $this->valid = false;
            }else{
                $this->valid = true;
            } 
        }
    }

}
