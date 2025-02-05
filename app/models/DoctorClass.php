<?php

class patient extends user implements signup{
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
             $role = 'patient';
 
             $query = $this->conn->prepare($sql);
 
             $query->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
             $query->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
             $query->bindParam(':email', $this->email, PDO::PARAM_STR);
             $query->bindParam(':password', $hasshed_password, PDO::PARAM_STR);
             $query->bindParam(':role', $role, PDO::PARAM_STR);   
     
             $query->execute();


 
         $_SESSION['id'] = $this->conn->lastInsertId();
         $_SESSION['role'] = $role;



         $sql = "INSERT INTO doctors(user_id, specialty) 
             VALUES(:user_id, :specialty );";
 
             $query = $this->conn->prepare($sql);

             $userid = $_SESSION['id'];
    
             $query->bindParam(':user_id', $userid, PDO::PARAM_STR);
             $query->bindParam(':date_of_birth', $this->birth_date, PDO::PARAM_STR);
             $query->bindParam(':phone', $this->phone, PDO::PARAM_STR);

     
             $query->execute();

 
         }catch(PDOException $error){
         die("an error in signup method for patients" . $error->getMessage());
         }   
    }



    public function TakeReservation($medcin_id,$appointment_date,$notes){
        try {
            $sql = "INSERT INTO appointments(patient_id, medecin_id, appointment_date, notes) 
            VALUES(:patient_id, :medecin_id, :appointment_date, :notes);";

            $query = $this->conn->prepare($sql);

            $userid = $this->user_id; 

            $query->bindParam(':patient_id', $userid, PDO::PARAM_INT);
            $query->bindParam(':medecin_id', $medcin_id, PDO::PARAM_INT);
            $query->bindParam(':appointment_date', $appointment_date, PDO::PARAM_STR);
            $query->bindParam(':notes', $notes, PDO::PARAM_STR);

    
            $query->execute();
        } catch (PDOException $error) {
            die("an error in TakeReservation method");
        }
    }


    public function getPatientReservations(){
        try{
        $sql = "SELECT appointments.*, doctors.* FROM appointments
        INNER JOIN doctors on appointments.medecin_id = doctors.id AND appointments.patient_id = :patient_id;";

            $query = $this->conn->prepare($sql); 

            $userid = $this->user_id; 

            $query->bindParam(':patient_id', $userid, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $error) {
        die("an error in signup method for patients" . $error->getMessage());        
        }
        
    }
        
}

?>