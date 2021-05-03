<?php
    class Student {
        private $db;
    
        public function __construct(){
          $this->db = new Database;
        }

        
        public function registerByAdmin($data, $agentModel){
          if($data['type'] == 4){
            $agentpotstudent = $agentModel->getTrueAgentAndPotentialStudent($data['agent'], $data['name']);
            if($agentpotstudent['agent'] != ''){
              $data['studentagent'] = $agentpotstudent['agent'];
              $this->deletePotentialStudent($agentpotstudent['potential_student']);
            }
            }
          $this->db->query('INSERT INTO students (name, email, phone, agent, person_name, reason, recruit_type, info_place, status, countries) VALUES(:name, :email, :phone, :agent, :person_name, :reason, :recruit_type, :info_place, :status, :countries)');
          // Bind values
          $this->db->bind(':name', $data['name']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':phone', $data['phone']);
          $this->db->bind(':reason', $data['reason']);
          $this->db->bind(':status', $data['status']);
          $this->db->bind(':agent', $data['studentagent']);
          $this->db->bind(':person_name', $data['agent']);
          $this->db->bind(':recruit_type', $data['type']);
          $this->db->bind(':info_place', $data['info']);
          $this->db->bind(':countries', $data['countries']);

          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        // Regsiter student
    public function register($data, $agentModel){
        if($data['type'] == 4){
        $agentpotstudent = $agentModel->getTrueAgentAndPotentialStudent($data['agent'], $data['name']);
        if($agentpotstudent['agent'] != ''){
          $data['studentagent'] = $agentpotstudent['agent'];
          $this->deletePotentialStudent($agentpotstudent['potential_student']);
        }
        }
        $this->db->query('INSERT INTO students (name, email, phone, agent, person_name, recruit_type, reason, info_place, countries) VALUES(:name, :email, :phone, :agent, :person_name, :recruit_type, :reason, :info_place, :countries)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':agent', $data['studentagent']);
        $this->db->bind(':person_name', $data['agent']);
        $this->db->bind(':recruit_type', $data['type']);
        $this->db->bind(':reason', $data['reason']);
        $this->db->bind(':info_place', $data['info']);
        $this->db->bind(':countries', $data['countries']);

        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }



        // Find student by email
        public function findStudentByEmail($email){
            $this->db->query('SELECT * FROM students WHERE email = :email');
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
        public function findStudentByPhone($phone){
            $this->db->query('SELECT * FROM students WHERE phone = :phone');
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
        public function getStudentByEmail($email){
            $this->db->query('SELECT * FROM students WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
            return $row;
      }

      public function deletePotentialStudent($id){
        $this->db->query('DELETE FROM potential_students WHERE id = :id');
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