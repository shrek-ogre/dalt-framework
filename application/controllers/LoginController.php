<?php

namespace app\controllers;

use frm\core\Controller;
use frm\core\Auth;
use frm\core\Response;

class LoginController extends Controller 
{
    /**
     *
     * @var string 
     */
    public $auth_status = '';

    public function __construct() {
        parent::__construct();        
    }

    public function indexAction() {
        $this->view->set('title', 'Login');
        
        if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
            if (Auth::auth($_REQUEST['login'], $_REQUEST['password'])) {
                Response::redirect('/admin/');
            } else {
                $this->auth_status = 'error';
            }            
        }
        
        $this->view->render('index');
    }   
    
    public function logoutAction() {
        Auth::logout();
        Response::redirect('/');
    }    
}
