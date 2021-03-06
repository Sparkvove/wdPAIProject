<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function settings(int $id){

        $user = $this->userRepository->getUserByID($id);
        $isAdmin = $this->userRepository->isUserAdmin($_COOKIE['currentUser']);

        return $this->render('settings', ['messages' => $this->message,
            'user'=>$user,'isAdmin'=>$isAdmin]);
    }


    public function logout(){
        $this->userRepository->deleteCookieUser();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    public function login(){


        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST['password'];
        $user = $this->userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User not exist']]);
        }
        if ($user->getEmail() !== $email){
            return $this->render('login',['messages' => ['User with this email not exist']]);
        }

        if(!password_verify($password, $user->getPassword()))
        {
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        $this->userRepository->setCookieUser($user->getEmail());
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }


    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }


        $user = new User($email, password_hash($password,PASSWORD_BCRYPT), $name);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}