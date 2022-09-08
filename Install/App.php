<?php
namespace Install;
defined("APPPATH") OR die("Access denied");

class App
{

    private $_controller;
    private $_method = "index";
    private $_params = [];
    public $config = [];
    const NAMESPACE_CONTROLLERS = "App\controllers\\";
    const CONTROLLERS_PATH = "../App/controllers/";

    public function __construct()
    {
        //obtenemos la url parseada
        $url = $this->parseUrl();

        //comprobamos que exista el archivo en el directorio controllers
        if(file_exists(self::CONTROLLERS_PATH.ucfirst($url[0]) . ".php"))
        {
            //nombre del archivo a llamar
            $this->_controller = ucfirst($url[0]);
            //eliminamos el controlador de url, así sólo nos quedaran los parámetros del método
            unset($url[0]);
        }
        else
        {
	    header('Location: /Home/');
            exit;
        }

        //obtenemos la clase con su espacio de nombres
        $fullClass = self::NAMESPACE_CONTROLLERS.$this->_controller;

        //asociamos la instancia a $this->_controller
	try{
           $this->_controller = new $fullClass;
	}catch(Exception $e){}

        //si existe el segundo segmento comprobamos que el método exista en esa clase
        if(isset($url[1]))
        {

            //aquí tenemos el método
            $this->_method = $url[1];
            if(method_exists($this->_controller, $url[1]))
            {
                //eliminamos el método de url, así sólo nos quedaran los parámetros del método
                unset($url[1]);
            }
            else
            {
                throw new \Exception("Error Processing Method {$this->_method}", 1);
            }
        }
        //asociamos el resto de segmentos a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        $this->_params = $url ? array_values($url) : [];
    }


    public function parseUrl()
    {
        if(isset($_GET["url"]))
        {
            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }

    public function render()
    {
        call_user_func_array([$this->_controller, $this->_method], $this->_params);
    }

    public static function getConfig()
    {
        return parse_ini_file(APPPATH . '/config/config.ini');
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getParams()
    {
        return $this->_params;
    }
}
