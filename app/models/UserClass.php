<?php

class User {

    protected $user_id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $role;
    protected $conn;

    
    public function __construct($first_name = null, $last_name = null, $email = null, $password = null, $role = null) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->conn = database::getInstance()->getConnection();
    }


    public function getUserId() {
        return $this->user_id;
    }
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }


    public function getFirstName() {
        return $this->first_name;
    }
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }


    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }


    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }


    public function getRole() {
        return
         $this->role;
    }
    public function setRole($role) {
        $this->role = $role;
    }


    public function getconn() {
        return $this->conn;
    }
    public function setconn($connection) {
        $this->conn = $connection;
    }


        public function cancelReservation(){
            try {
                $sql="UPDATE appointments SET status=:statu WHERE patient_id=:id;";
        
                $query = $this->conn->prepare($sql);

					 $status = 'cancelled';
        
                $query->bindParam(':statu', $status, PDO::PARAM_STR);
                $query->bindParam(':id', $this->user_id, PDO::PARAM_INT);
        
                $query->execute();
            } catch (PDOException $error) {
                die('an error in cancelReservation method' . $error->getmessage());
            }
        }

        public function login(){
            try{
                
                $sql="SELECT * FROM users WHERE email=:email;";
        
                $query = $this->conn->prepare($sql);
        
                $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        
                $query->execute();
        
                $user = $query->fetch(PDO::FETCH_ASSOC);

                    
                    if($user && password_verify($this->password, $user['password']) ){
                    $_SESSION['id'] = $user['user_id'];             
                    $_SESSION['role'] = $user['role'];
                }else{
                    die("Invalid email or password.");
                }
            
            }catch (PDOException $error) {
                die("An error in login method: " . $error->getMessage());
            }
            
        }
        
        public function logout(){
            session_unset();    
            session_destroy();
        }

		 public function signup();
        
}

?>