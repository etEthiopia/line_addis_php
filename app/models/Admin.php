<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function changeEmpPassword($password, $id){
        $this->db->query('UPDATE employees SET password = :password WHERE id = :id');
        $this->db->bind(':password', password_hash($password, PASSWORD_BCRYPT));
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      
    }

    public function changeAgentPassword($password, $id){
      $this->db->query('UPDATE agents SET password = :password WHERE id = :id');
      $this->db->bind(':password', password_hash($password, PASSWORD_BCRYPT));
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
       
      } else {
        return false;
      }
    
  }

    public function getStudents(){
      $this->db->query('SELECT * FROM students ORDER BY id DESC');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getTodaysTasks(){
      $objDateTime = new DateTime('NOW');
      $timestamp = $objDateTime->format('Y-m-d');
      $this->db->query('SELECT * FROM tasks WHERE date = :today ORDER BY id DESC');
      $this->db->bind(':today', $timestamp);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getAllTasks(){
      $this->db->query('SELECT * FROM tasks ORDER BY id DESC');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getAllGalleryContestApplicants(){
      $this->db->query('SELECT * FROM gallery_contest_groups ORDER BY id DESC');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getEmployees(){
      $this->db->query('SELECT * FROM employees ORDER BY id ASC');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getTask($id){
      $data = [
        'data' => '',
        'files' => ''
      ];

      $this->db->query('SELECT * FROM tasks WHERE id = :id');
        // Bind value
        
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
          $data['data'] = $row;
          if($row->file == 1){
            $data['files'] = $this->getFiles($id);
          }
          
        } 
        return $data;
    }

    public function getGalleryContestApplicant($id){
      $data = [
        'data' => '',
        'files' => ''
      ];

      $this->db->query('SELECT * FROM gallery_contest_groups WHERE id = :id');

        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
          $data['data'] = $row;
          if($row->file == 1){
            $data['files'] = $this->getGalleryContestApplicantFiles($row->email);
          }
          
        } 
        return $data;
    }

    public function getStudent($id){
     
      $this->db->query('SELECT * FROM students WHERE id = :id');
        // Bind value
        
      $this->db->bind(':id', $id);

      $data['student'] = $this->db->single();
      $data['files'] = NULL;

        // Check row
      if($this->db->rowCount() > 0){
        if(!empty($data['student']->agent)){
          $this->db->query('SELECT name FROM agents WHERE id = :id');
          $this->db->bind(':id', $data['student']->agent);
          $agent_row = $this->db->single();
          if($this->db->rowCount() > 0){
            $data['student']->agent_name = $agent_row->name;
          }
        }
        $data['files'] = $this->getStudentFiles($data['student']->email);

          
      } 
      return $data;
    }

    public function changeStatus($status, $id){
      if($status == 2){
        $this->db->query('UPDATE students SET status = :status, adv_commission = :adv_commission WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':adv_commission', -1000);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      elseif($status == 3){
        $this->db->query('UPDATE students SET status = :status, final_commission = :final_commission WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':final_commission', -4000);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }else{
        $this->db->query('UPDATE students SET status = :status WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
     
      
    
    
  }

    public function getFiles($taskid){
      $this->db->query('SELECT * FROM task_files WHERE task_id = :id');
         $this->db->bind(':id', $taskid);

        $row = $this->db->single();
        // Check row
        return $this->db->resultSet();
    }

    public function getGalleryContestApplicantFiles($email){
      $this->db->query('SELECT * FROM gallery_contest_group_files WHERE email = :email');
         $this->db->bind(':email', $email);

        $row = $this->db->single();
        // Check row
        return $this->db->resultSet();
    }

    
    public function getStudentFiles($studentemail){
      $this->db->query('SELECT * FROM files WHERE student = :studentemail');
         $this->db->bind(':studentemail', $studentemail);
        $row = $this->db->single();
        // Check row
        return $this->db->resultSet();
    }

    public function payAgent($id, $type, $amount){
      if($type == 1){
        $this->db->query('UPDATE students SET adv_commission = :amount WHERE id = :id');
        $this->db->bind(':amount', $amount);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      elseif($type == 2){
        $this->db->query('UPDATE students SET final_commission = :amount WHERE id = :id');
        $this->db->bind(':amount', $amount);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      else{
        return false;
      }
    }

    

    public function getAgent($id){
      $this->db->query('SELECT * FROM agents WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $agent = $this->db->single();
      $this->db->query('SELECT * FROM students WHERE agent = :agentid');
      $this->db->bind(':agentid', $id);
      $stus = $this->db->resultSet();
      $agent->students =  $stus;
      $agent->processing = 0;
      $agent->granted = 0;
      $agent->unpaid = 0;
      $agent->totalmoney = 0;
      $agent->bonuses = [];
      $potbonus = [];
      if(count($stus) > 0){
        foreach($stus as $stu){
      if($stu->status == 2){
        $agent->processing += 1;
        $agent->totalmoney += abs($stu->adv_commission);
        if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
          $potbonus[substr($stu->created_at, 0, 7)] = 1;
        }
        else{
          $potbonus[substr($stu->created_at, 0, 7)] += 1;
        }
      }
      elseif($stu->status == 3){
        $agent->granted +=1;
        $agent->totalmoney += abs($stu->adv_commission);
        $agent->totalmoney += abs($stu->final_commission);
        if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
          $potbonus[substr($stu->created_at, 0, 7)] = 1;
        }
        else{
          $potbonus[substr($stu->created_at, 0, 7)] += 1;
        }
      }

      if($stu->adv_commission < 0){
        $agent->unpaid += abs($stu->adv_commission);
        //$agent->totalmoney += abs($stu->adv_commission);
      }if($stu->final_commission < 0){
        $agent->unpaid += abs($stu->final_commission);
        //$agent->totalmoney += abs($stu->final_commission);
      }
    }}
    foreach(array_keys($potbonus) as $potbon){
      if($potbonus[$potbon] > 2){
        if($potbonus[$potbon] <= 6 ){
          $agent->totalmoney += 5000;
        }
        elseif($potbonus[$potbon] <= 10 ){
          $agent->totalmoney += 15000;
        }
        else{
         $agent->totalmoney += 25000;
        }
      
      }
     }
     $bonusdata = $this->getBonusStatus($id, array_keys($potbonus));
     $finalbonusdata = [];
      foreach(array_keys($potbonus) as $bonus){
        if(!array_key_exists($bonus, $bonusdata) ){
          if($potbonus[$bonus] > 2){
          if($potbonus[$bonus] <= 6 ){
            $agent->unpaid += 5000;
          }
          elseif($potbonus[$bonus] <= 10 ){
            $agent->unpaid += 15000;
          }
          else{
           $agent->unpaid += 25000;
          }
        }
        }
        elseif($bonusdata[$bonus] == 0){
          if($potbonus[$bonus] > 2){
          if($potbonus[$bonus] <= 6 ){
            $agent->unpaid += 5000;
          }
          elseif($potbonus[$bonus] <= 10 ){
            $agent->unpaid += 15000;
          }
          else{
           $agent->unpaid += 25000;
          }
        }
        }
      
      }
      foreach(array_keys($potbonus) as $bonus){
        if($potbonus[$bonus] > 2){
        $paid = false;
        if(array_key_exists($bonus, $bonusdata)){
            $paid = true;
        }
        $amount = 0;
        if($potbonus[$bonus]<= 6 ){
          $amount = 5000;
         }
         elseif($potbonus[$bonus] <= 10 ){
          $amount = 15000;
         }
         else{
          $amount = 25000;
         }
        array_push($agent->bonuses, ['month' => $bonus ,'prize' => $amount, 'students' => $potbonus[$bonus], 'status' => $paid]);
        }
      }

      return $agent;
    }

    public function getEmployee($id){
      $this->db->query('SELECT * FROM employees WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $employee = $this->db->single();
      $this->db->query('SELECT * FROM tasks WHERE emp_id = :id ORDER BY created_at DESC');
      $this->db->bind(':id', $id);
      $employee->tasks = $this->db->resultSet();
      $this->db->query('SELECT * FROM contacts WHERE emp_id = :empid ORDER BY id DESC');
      $this->db->bind(':empid', $id);
      $employee->contacts = $this->db->resultSet();
      $employee->todayTasks =  0;
      if(count($employee->tasks) > 0){
        $objDateTime = new DateTime('NOW');
        $timestamp = $objDateTime->format('Y-m-d');
        foreach($employee->tasks as $stu){
          if($stu->date == $timestamp){
            $employee->todayTasks += 1;
          }
    }}
      return $employee;
    }

    public function getAgents(){
      $this->db->query('SELECT * FROM agents ORDER BY id DESC');
      $agents = $this->db->resultSet();
      foreach($agents as $agent) {
        $agent->processing = 0;
        $agent->registered = 0;
        $agent->granted = 0;
        $agent->unpaid = 0;
        $agent->totalmoney = 0;
        $potbonus = [];
        $this->db->query('SELECT * FROM students WHERE agent = :agentid');
        $this->db->bind(':agentid', $agent->id);
        $stus = $this->db->resultSet();
        if(count($stus) > 0){
          foreach($stus as $stu){
            if($stu->status == 1){
              $agent->registered += 1;
            }
            elseif($stu->status == 2){
              $agent->processing += 1;
              $agent->totalmoney += abs($stu->adv_commission);
              if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
                $potbonus[substr($stu->created_at, 0, 7)] = 1;
              }
              else{
                $potbonus[substr($stu->created_at, 0, 7)] += 1;
              }
            }
            elseif($stu->status == 3){
              $agent->granted +=1;
              $agent->totalmoney += abs($stu->adv_commission);
              $agent->totalmoney += abs($stu->final_commission);
              if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
                $potbonus[substr($stu->created_at, 0, 7)] = 1;
              }
              else{
                $potbonus[substr($stu->created_at, 0, 7)] += 1;
              }
            }

            if($stu->adv_commission < 0){
              $agent->unpaid += abs($stu->adv_commission);
              //$agent->totalmoney += abs($stu->adv_commission);
            }if($stu->final_commission < 0){
              $agent->unpaid += abs($stu->final_commission);
              //$agent->totalmoney += abs($stu->final_commission);
            }
            

          }
        }
        foreach(array_keys($potbonus) as $potbon){
          if($potbonus[$potbon] > 2){
            if($potbonus[$potbon] <= 6 ){
              $agent->totalmoney += 5000;
            }
            elseif($potbonus[$potbon] <= 10 ){
              $agent->totalmoney += 15000;
            }
            else{
             $agent->totalmoney += 25000;
            }
          
          }
         }
         $bonusdata = $this->getBonusStatus($agent->id, array_keys($potbonus));
         $finalbonusdata = [];
          foreach(array_keys($potbonus) as $bonus){
            if(!array_key_exists($bonus, $bonusdata) ){
              if($potbonus[$bonus] > 2){
              if($potbonus[$bonus] <= 6 ){
                $agent->unpaid += 5000;
              }
              elseif($potbonus[$bonus] <= 10 ){
                $agent->unpaid += 15000;
              }
              else{
               $agent->unpaid += 25000;
              }
            }
            }
            elseif($bonusdata[$bonus] == 0){
              if($potbonus[$bonus] > 2){
              if($potbonus[$bonus] <= 6 ){
                $agent->unpaid += 5000;
              }
              elseif($potbonus[$bonus] <= 10 ){
                $agent->unpaid += 15000;
              }
              else{
               $agent->unpaid += 25000;
              }
            }
            }
          
          }

      }
      return $agents;
    }

    public function getBonusStatus($id, $months){
      $data = [];
      $this->db->query('SELECT * FROM bonuses WHERE agent = :agentid');
      $this->db->bind(':agentid', $id);
      $stus = $this->db->resultSet();
      if(count($stus) > 0){
        foreach($stus as $stu){
      if(in_array($stu->month, $months)){
          $data[$stu->month] = 1;
      }
    }}
      return $data;
    }


    public function getStudentStats(){
      $this->db->query('SELECT (SELECT COUNT(id) FROM students WHERE status = 3) AS visaStudents, (SELECT COUNT(id) FROM students WHERE status = 2) AS processingStudents, (SELECT COUNT(id) FROM students WHERE status = 1) AS registeredStudents, (SELECT COUNT(id) FROM students WHERE status = 4) AS failedStudents');
      $row = $this->db->single();
      return $row;
    }

    public function getAgentStats(){
      $this->db->query('SELECT * FROM agents ORDER BY id DESC ');
      $agents = $this->db->resultSet();
      foreach($agents as $agent) {
         $agent->totalmoney = 0;
        $this->db->query('SELECT * FROM students WHERE agent = :agentid');
        $this->db->bind(':agentid', $agent->id);
        $stus = $this->db->resultSet();
        $potbonus = [];
        if(count($stus) > 0){
          foreach($stus as $stu){
            if($stu->status == 2){
              $agent->totalmoney += abs($stu->adv_commission);
              if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
                $potbonus[substr($stu->created_at, 0, 7)] = 1;
              }
              else{
                $potbonus[substr($stu->created_at, 0, 7)] += 1;
              }
            }
            elseif($stu->status == 3){
              $agent->totalmoney += abs($stu->adv_commission);
              $agent->totalmoney += abs($stu->final_commission);
              if(!array_key_exists(substr($stu->created_at, 0, 7),  $potbonus)){
                $potbonus[substr($stu->created_at, 0, 7)] = 1;
              }
              else{
                $potbonus[substr($stu->created_at, 0, 7)] += 1;
              }
            }

          }
        }
        foreach(array_keys($potbonus) as $potbon){
          if($potbonus[$potbon] > 2){
            if($potbonus[$potbon] <= 6 ){
              $agent->totalmoney += 5000;
            }
            elseif($potbonus[$potbon] <= 10 ){
              $agent->totalmoney += 15000;
            }
            else{
             $agent->totalmoney += 25000;
            }
          
          }
         }
        
        

      }
      return $agents;
    }

    public function getContact($id){
      $this->db->query('SELECT * FROM contacts WHERE id = :id');
        // Bind value
        
        $this->db->bind(':id', $id);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return $row;
          
        } else{
          return null;
        }
    }

    public function getTodaysContacts(){
      $objDateTime = new DateTime('NOW');
      $timestamp = $objDateTime->format('Y-m-d');
      $this->db->query('SELECT * FROM contacts WHERE created_at LIKE :today ORDER BY id DESC');
      $this->db->bind(':today', $timestamp."%");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getAllContacts(){
      $this->db->query('SELECT * FROM contacts ORDER BY id DESC');
      $results = $this->db->resultSet();
      return $results;
    }


    public function registerEmployee($data){
      $this->db->query('INSERT INTO employees (name, emp_id, password) VALUES(:name, :emp_id, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':emp_id', $data['emp_id']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function payBonus($agent, $month){
      $this->db->query('INSERT INTO bonuses (agent, month) VALUES(:agent, :month)');
        $this->db->bind(':agent', $agent);
        $this->db->bind(':month', $month);
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
  

    // Login Employee
    public function login($username, $password){
        $this->db->query('SELECT * FROM admins  WHERE user_name = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
          return $row;
        } else {
          return false;
        }
    }

    
  }