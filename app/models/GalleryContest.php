<?php
  class GalleryContest {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add Task 
    public function addGalleryGroup($data){
        $this->db->query('INSERT INTO gallery_contest_groups (name, phone, members, email, city, university, file) VALUES(:name, :phone, :members, :email, :city, :university, :file)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':members', $data['members']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':university', $data['university']);
        $this->db->bind(':file', $data['fileempty']);
        if($this->db->execute()){
          $this->db->query('SELECT * FROM gallery_contest_groups WHERE email = :email LIMIT 1');
          // Bind value
          $this->db->bind(':email',$data['email']);
          $row = $this->db->single();
          if($this->db->rowCount() > 0){
            return $row->id;
          } else {
            return 0;
          } 
          } else {
            return 0;
          }
    }

      // Find group by email
    public function findGroupByEmail($email){
        $this->db->query('SELECT * FROM gallery_contest_groups WHERE email = :email');
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

    // Find group by phone
    public function findGroupByPhone($phone){
        $this->db->query('SELECT * FROM gallery_contest_groups WHERE phone = :phone');
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

    public function deleteGroup($id){
        $this->db->query('DELETE FROM gallery_contest_groups WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }
  }

?>