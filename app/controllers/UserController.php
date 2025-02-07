<?php

class UserController {
    private $userModel;

    public function __constructor(){
        $this->userModel = new User;
    }

    public function cancelReservation(){
        echo "Canceling reservation";
        $this->userModel->cancelReservation();
    }

    public function login(){
        echo "login";
         $this->userModel->login();
    }
    
    public function logout(){
        echo "done sucesfully";
      $this->userModel->logout();
    }
}

?>