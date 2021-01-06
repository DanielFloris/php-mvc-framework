<?php
namespace app\controllers;

/**
 * Class SiteController
 * 
 * @author daMask
 * @package app\controllers
 */

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
 {
     public function home(){
         $params = [ 'name' => 'daMask'];
         return $this->render('home', $params);
     }
     public function contact(){      
        return $this->render('contact');
    }
     public function handleContact(Request $request) {
         $body = $request->getBody();
            echo '<pre>';
            var_dump($body);
            echo '</pre>';
            exit;
         return 'Handling submitted data';
     }
 }