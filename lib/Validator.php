<?php

class Validator{


    private $inputs;
    private $errors = [];
    public $fields = ['name', 'username', 'email', 'password'];
    private $db;



    public function __construct($input_fields)
    {
        $this->inputs = $input_fields;
        $this->db = new Database;
    }

    public function vaidate(){

        foreach ($this->fields as $field){
            if(!array_key_exists($field, $this->inputs)){
                trigger_error("$field not present");
                return;
            }
        }

        $this->validate_name();
        $this->validate_username();
        $this->validate_email();
        $this->validate_password();

        return $this->errors;

        
    }


    private function validate_name(){
        $name = trim($this->inputs['name']);

        if(empty($name)){
            $this->addError('name', 'Please enter your name');
        }else{
            if(!preg_match("/^[a-zA-Z0-9]+$/", $name)){
                $this->addError('name', 'Your name must contain letters or numbers');
            }
        }
    }


    private function validate_username(){
        $username = trim($this->inputs['username']);

        if(empty($username)){
            $this->addError('username', 'Username cannot be empty');
        }else{
            if(!preg_match("/^[a-zA-Z0-9]+$/", $username)){
                $this->addError('username', 'Your username must contain letters or numbers 6 char long');
            }
        }
    }

    private function validate_email(){
        $email = trim($this->inputs['email']);
        if(empty($email)){
            $this->addError('email', 'Email cannot be empty');
        }else{
            if(!filter_var($email, FILTER_SANITIZE_EMAIL)){
                $this->addError('email', 'Invalid email');
            }
        }
    }

    private function validate_password(){
        $pass = trim($this->inputs['username']);

        if(empty($pass)){
            $this->addError('password', 'Password cannot be empty');
        }else{
            if(strlen($pass) < 6){
                $this->addError('password', 'Your password must be 6 characters long');
            }
        }
    }

    private function addError($key, $value){
        $this->errors[$key] = $value;
    }


    public function register(){
        //get the user details 
        // insert it into the database
        //return true if sucessful

        // return $this->inputs;

        $name = $this->inputs['name'];
        $username = $this->inputs['username'];
        $email = $this->inputs['email'];
        $password = $this->inputs['password'];

        $password = password_hash($password, PASSWORD_BCRYPT);

        $statement = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";

        $this->db->query($statement);

        $this->db->bind(':name', $name);
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        if($this->db->execute()){
            return true;

        }else{
            return false;
        }


        

    }

    


}