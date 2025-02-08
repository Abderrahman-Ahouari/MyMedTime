<?php

class DoctorController {
    private $DoctorModel;

    public function __constructor(){
        $this->DoctorModel = new doctor;
    }

    public function doctorsignup(){
        echo "doctor signup";
        $this->DoctorModel->cancelReservation();
    }

    public function getDoctorReservations(){
        echo "getDoctorReservations";
         $this->DoctorModel->getDoctorReservations();           
    }
    
    public function addDisponibility(){
        echo "addDisponibility";
      $this->DoctorModel->addDisponibility();
    }
}

?>