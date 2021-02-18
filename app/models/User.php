<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, phone, password, type) VALUES(:name, :email, :phone, :password, :utype)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':utype', $data['type']);// Execute
      if($this->db->execute()){
        if($data['type']==1){
          if($this->registerStudent($data)){
            return true;
          }
          else{
            $this->deleteUser($data['email']);
            return false;
          }
        }
        else if($data['type']==2){
          if($this->registerSubAgent($data)){
            return true;
          }
          else{
            $this->deleteUser($data['email']);
            return false;
          }
        }
        
       
      } else {
        return false;
      }
    }

    // Regsiter student
    public function registerStudent($data){
      $this->db->query('INSERT INTO students ( email, affiliate, reason) VALUES(:email, :affiliate, :reason)');
      // Bind values
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':affiliate', $data['affiliate']);
      $this->db->bind(':reason', $data['reason']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Regsiter subagent
    public function registerSubAgent($data){
      $this->db->query('INSERT INTO subagents (id, email) VALUES(:id, :email)');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':email', $data['email']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete User
    public function deleteUser($email){
      $this->db->query('DELETE FROM users WHERE $email = :email');
      // Bind values
      $this->db->bind(':email', $email);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users,  WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify(password_hash($data['password'], PASSWORD_BCRYPT), $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }


    // Find user by phone
    public function findUserByPhone($phone){
      $this->db->query('SELECT * FROM users WHERE phone = :phone');
      // Bind value
      $this->db->bind(':phone', $phone);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get User by Email
    public function getUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      return $row;
    }

    // Get User by SubAgent
    public function getSubAgentById($id){
      $this->db->query('SELECT * FROM subagents WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }