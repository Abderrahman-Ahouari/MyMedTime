<?php

class doctor extends user{
    private $speciality;
    private $available_days;
    
    public function __construct($first_name = null, $last_name = null, $email = null, $password = null, $role = null, $speciality=null, $available_days=null) {
        $this->speciality = $speciality;
        $this->available_days = $available_days;
        parent::__construct($first_name , $last_name , $email , $password , $role )
    }


    public function signup(){
        try{
         $sql = "INSERT INTO users(first_name, last_name, email, password, role) 
             VALUES(:first_name, :last_name, :email, :password, :role );";
 
             $hasshed_password = password_hash($this->password,PASSWORD_DEFAULT);
             $role = 'doctor';
 
             $query = $this->conn->prepare($sql);
 
             $query->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
             $query->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
             $query->bindParam(':email', $this->email, PDO::PARAM_STR);
             $query->bindParam(':password', $hasshed_password, PDO::PARAM_STR);
             $query->bindParam(':role', $role, PDO::PARAM_STR);   
     
             $query->execute();


 
         $_SESSION['id'] = $this->conn->lastInsertId();
         $_SESSION['role'] = $role;

 
         }catch(PDOException $error){
         die("an error in signup method for doctor" . $error->getMessage());
         }   
    }


    public function getDoctorReservations(){
        try{
        $sql = "SELECT appointments.*, patients.* FROM appointments
        INNER JOIN patients on appointments.patient_id = patients.id AND appointments.medecin_id = :medecin_id;";

            $query = $this->conn->prepare($sql); 

            $userid = $this->user_id; 

            $query->bindParam(':medecin_id', $userid, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $error) {
        die("an error in getDoctorReservations method for patients" . $error->getMessage());        
        }
        
    }


    public function addDisponibility(){
        try {
            
        } catch (PDOException $error){
            die("an error in addDisponibility method for doctor: " . $error->getMessage());
        }
    }

    public function addDisponibility($available_day){
        try {

            $sql = "INSERT INTO availability (doctor_id, available_day) VALUES (:doctor_id, :available_day)";

            $query = $this->conn->prepare($sql);
            
            $query->bindParam(":doctor_id", $doctor_id, PDO::PARAM_INT);
            $query->bindParam(":available_day", $available_day, PDO::PARAM_STR);
    
            $query->execute();

        } catch (PDOException $error){
            die("An error occurred in addDisponibility method for doctor: " . $error->getMessage());
        }
    }
    
        
}

?>