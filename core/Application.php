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
   public string $userClass;
   public Response $response;
   public Router $router;
   public Request $request;
   public Database $db;
   public static Application $app;
   public Controller $controller;
   public Session $session;
   public ?DbModel $user;

     public function __construct($rootPath, array $config){
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->userClass = $config['userClass'];
        $this->session = new Session();
        $primaryValue = $this->session->get('user');
        if($primaryValue){
           $primaryKey = $this->userClass::primaryKey();
           $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
           $this->user = null;
        }
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
   public function login(DbModel $user){
      $this->user = $user;
      $primaryKey = $user->primaryKey();
      $primaryValue = $user->{$primaryKey};
      $this->session->set('user', $primaryValue);
      return true;
   }
   public function logout(){
         $this->user = null;
         $this->session->remove('user');
   } 
   public static function isGuest(){
      return !self::$app->user;
   }
}