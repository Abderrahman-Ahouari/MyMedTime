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
         $this->userModel->login();
    }
    
    public function logout(){
      $this->userModel->logout();
    }


}

?>