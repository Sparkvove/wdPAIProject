<?php

require_once 'AppController.php';

class DefaultController extends AppController{


    public function index(){
        $this->render('login');
    }

    public function login(){
        $this->render('login');
    }

    public function dashboard(){
        $this->render('dashboard');
    }


    public function list(){
        $this->render('list');
    }


    public function register()
    {
        $this->render('register');
    }



}