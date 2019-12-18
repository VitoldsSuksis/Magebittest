<?php
 include "db_config.php";

    class User
    {
        public $db;

        public function __construct()
        {
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if (mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                exit;
            }
        }

        public function register($name, $email, $password)
        {         
            $check = $this->db->query("SELECT * FROM users WHERE email='$email'");
            $row_count = $check->num_rows;
            if ($row_count == 0) {
                $password = md5($password);
                $sql="INSERT INTO users SET fullname='$name', email='$email', password='$password'";
                mysqli_query($this->db, $sql) or die(mysqli_connect_errno()."Data cannot inserted");
                $_SESSION['fullname'] = $name;
                $_SESSION['email'] = $email;
                return true;
            } else {
                return false;
            }
        }
        
        public function login($email, $password){
            $password = md5($password);
            $sql="SELECT * from users WHERE email='$email' and password='$password'";
            $result = mysqli_query($this->db, $sql);
            $user_data = mysqli_fetch_array($result);
            $row_count = $result->num_rows;
            if ($row_count == 1) {
                $_SESSION['fullname'] = $user_data['fullname'];
                $_SESSION['email'] = $user_data['email'];
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            session_destroy();
        }
    }
        
       
