<?php
namespace app\core;
/**
 * Class Application
 * 
 * @author Damask
 * @package  app\core
 */

 class Application {
   public static string $ROOT_DIR;
   public Response $response;
   public Router $router;
   public Request $request;
   public Database $db;
   public static Application $app;
   public Controller $controller;

     public function __construct($rootPath, array $config){
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
     }

     public function run(){
        echo $this->router->resolve();
     }

   /**
    * Get the value of controller
    */ 
   public function getController()
   {
      return $this->controller;
   }

   /**
    * Set the value of controller
    *
    */ 
   public function setController(Controller $controller)
   {
      $this->controller = $controller;

   }
 }