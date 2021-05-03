<?php
  class File {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function addfiles($insertValuesSQL){
      $this->db->query("INSERT INTO files (dir, student, type) VALUES $insertValuesSQL");
      if($this->db->execute()){ 
        return true;
    }else{ 
        return false;
    }   
    }

    public function addTaskFiles($insertValuesSQL){
      $this->db->query("INSERT INTO task_files (dir, emp_id, task_id, type) VALUES $insertValuesSQL");
      if($this->db->execute()){ 
        return true;
    }else{ 
        return false;
    }   
    }

    public function addGalleryContestGroupFiles($insertValuesSQL){
      $this->db->query("INSERT INTO gallery_contest_group_files (dir, group_id, email) VALUES $insertValuesSQL");
      if($this->db->execute()){ 
        return true;
    }else{ 
        return false;
    }   
    }


    // Find user by email
    public function findFileByEmail($email){
      $this->db->query('SELECT * FROM files WHERE student = :user');
      // Bind value
      $this->db->bind(':user', $email);

      $results = $this->db->resultSet();

      // Check row
     return $results;
    }

    // Get User by ID
    public function getFileById($id){
      $this->db->query('SELECT * FROM files WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }