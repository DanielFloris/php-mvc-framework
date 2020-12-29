<?php
namespace app\controllers;

/**
 * Class SiteController
 * 
 * @author daMask
 * @package app\controllers
 */
// Not sure if this line is correct
use app\core\Controller;

class SiteController extends Controller
 {
     public function home(){
         $params = [ 'name' => 'daMask'];
         return $this->render('home', $params);
     }
     public function contact(){
      
        return $this->render('contact');
    }
     public function handleContact() {
         return 'Handling submitted data';
     }
 }