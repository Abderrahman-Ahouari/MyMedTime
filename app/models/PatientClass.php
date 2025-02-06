<?php

class patient extends user{
    private $birth_date;
    private $phone;


    
    public function __construct($first_name = null, $last_name = null, $email = null, $password = null, $role = null, $birth_date=null, $phone=null) {
        $this->birth_date = $birth_date;
        $this->phone = $phone;
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