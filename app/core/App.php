<?php 

class App {
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    
    public function __construct() {
        session_start();
        
        $url = $this->parseUrl();

        if(isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once '../app/controllers/' . $this->controller . '.controller.php';

        $this->controller = new ($this->controller . "Controller")();

        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        
        $this->params = $url ? array_values($url) : [];

        try {
            call_user_func_array(array($this->controller, $this->method), $this->params);
        } catch (TypeError $e) {
            // header("Location: ".SITE_URL);
        }
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}