<?php

class patientController {
    private $patientModel;

    public function __constructor(){
        $this->patientModel = new patient;
    }

    public function patientsignup(){
        echo "patient signup";
        $this->patientModel->signup();
    }

    public function TakeReservation(){
        echo "TakeReservation";
         $this->patientModel->TakeReservation();
    }
    
    public function getPatientReservations(){
        echo "getPatientReservations";
      $this->patientModel->getPatientReservations();
    }
}

?>