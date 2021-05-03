<?php
  class Agent {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO agents (name, promo_code, id, email, phone, password, bank_name, bank_account) VALUES(:name, :promocode, :id, :email, :phone, :password, :bankname, :bankaccount)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':promocode', $data['promocode']);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':password', password_hash($data['tpassword'], PASSWORD_BCRYPT));
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':bankname', $data['bankname']);
      $this->db->bind(':bankaccount', $data['bankaccount']);
      if($this->db->execute()){
        return true;
       
      } else {
        return false;
      }
    }

    // Regsiter user
    public function update($data, $id, $length){
      if(in_array("password", $length) && in_array("picture", $length)){
        $this->db->query('UPDATE agents SET name = :name, email = :email, password = :password, phone = :phone, bank_name = :bankname, bank_account = :bankaccount, picture = :picture WHERE id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':bankname', $data['bank_name']);
        $this->db->bind(':bankaccount', $data['bank_account']);
        $this->db->bind(':picture', $data['picture']);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      elseif(in_array("password", $length)){
        $this->db->query('UPDATE agents SET name = :name, email = :email, password = :password, phone = :phone, bank_name = :bankname, bank_account = :bankaccount WHERE id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':bankname', $data['bank_name']);
        $this->db->bind(':bankaccount', $data['bank_account']);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      elseif(in_array("picture", $length)){
        $this->db->query('UPDATE agents SET name = :name, email = :email, phone = :phone, bank_name = :bankname, bank_account = :bankaccount, picture = :picture WHERE id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':bankname', $data['bank_name']);
        $this->db->bind(':bankaccount', $data['bank_account']);
        $this->db->bind(':picture', $data['picture']);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }else{
        $this->db->query('UPDATE agents SET name = :name, email = :email, phone = :phone, bank_name = :bankname, bank_account = :bankaccount WHERE id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':bankname', $data['bank_name']);
        $this->db->bind(':bankaccount', $data['bank_account']);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      }
      
    }

    // Regsiter suggested student
    public function registerSuggested($data, $length){
      
      if($length == 2){
        $this->db->query('INSERT INTO potential_students (name, phone, agent) VALUES(:name, :phone, :agent),(:name2, :phone2, :agent)');
        $this->db->bind(':name', $data['name_1']);
        $this->db->bind(':phone', $data['phone_1']);
        $this->db->bind(':name2', $data['name_2']);
        $this->db->bind(':phone2', $data['phone_2']);
        $this->db->bind(':agent', $data['affiliate']);
        // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      }
      elseif($length == 3){
        $this->db->query('INSERT INTO potential_students (name, phone, agent) VALUES(:name, :phone, :agent),(:name2, :phone2, :agent),(:name3, :phone3, :agent)');
        $this->db->bind(':name', $data['name_1']);
        $this->db->bind(':phone', $data['phone_1']);
        $this->db->bind(':name2', $data['name_2']);
        $this->db->bind(':phone2', $data['phone_2']);
        $this->db->bind(':name3', $data['name_3']);
        $this->db->bind(':phone3', $data['phone_3']);
        $this->db->bind(':agent', $data['affiliate']);
        // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      }else{
          $this->db->query('INSERT INTO potential_students (name, phone, agent) VALUES(:name, :phone, :agent)');
          $this->db->bind(':name', $data['name_1']);
          $this->db->bind(':phone', $data['phone_1']);
          $this->db->bind(':agent', $data['affiliate']);
          // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
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

    // Delete Agent
    public function deleteAgent($email){
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



    // Login Agent
    public function login($email, $password){
      $this->db->query('SELECT * FROM agents  WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      

      $hashed_password = $row->password;

      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findAgentByEmail($email){
      $this->db->query('SELECT * FROM agents WHERE email = :email');
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
    public function findAgentByPhone($phone){
      $this->db->query('SELECT * FROM agents WHERE phone = :phone');
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

    // Find user by phone
    public function findAnotherAgentByPhone($phone, $id){
      $this->db->query('SELECT * FROM agents WHERE phone = :phone AND id != :id');
      // Bind value
      $this->db->bind(':phone', $phone);
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get Agent by Email
    public function getAgentByEmail($email){
      $this->db->query('SELECT * FROM agents WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      return $row;
    }

    // Get Agent by Email
    public function findAnotherAgentByEmail($email, $id){
      $this->db->query('SELECT * FROM agents WHERE email = :email AND id != :id');
      // Bind value
      $this->db->bind(':email', $email);
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get Agent by SubAgent
    public function getAgentById($id){
      $this->db->query('SELECT * FROM agents WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getVisaStudentsAndTotalMoney($id){
      $data = [
        'visa_students' => 0,
        'total_money' => 0,
        'potbonus' => [],
        'bonus' => [],
        'finalbonus' => []
      ];
      $this->db->query('SELECT * FROM students WHERE agent = :agentid');
      $this->db->bind(':agentid', $id);
      $stus = $this->db->resultSet();
      if(count($stus) > 0){
        foreach($stus as $stu){
      if($stu->status == 2){
        $data['total_money'] += abs($stu->adv_commission);
        if(!array_key_exists(substr($stu->created_at, 0, 7), $data['potbonus'])){
          $data['potbonus'][substr($stu->created_at, 0, 7)] = 1;
        }
        else{
          $data['potbonus'][substr($stu->created_at, 0, 7)] += 1;
        }
      }
      elseif($stu->status == 3){
        $data['visa_students'] +=1;
        $data['total_money'] += abs($stu->adv_commission);
        $data['total_money'] += abs($stu->final_commission);
        if(!array_key_exists(substr($stu->created_at, 0, 7), $data['potbonus'])){
          $data['potbonus'][substr($stu->created_at, 0, 7)] = 1;
        }
        else{
          $data['potbonus'][substr($stu->created_at, 0, 7)] += 1;
        }
      }

    }}
    foreach(array_keys($data['potbonus']) as $potbon){
     if($data['potbonus'][$potbon] > 2){
       if($data['potbonus'][$potbon] <= 6 ){
        $data['total_money'] += 5000;
       }
       elseif($data['potbonus'][$potbon] <= 10 ){
        $data['total_money'] += 15000;
       }
       else{
        $data['total_money'] += 25000;
       }
      $data['bonus'][$potbon] = $data['potbonus'][$potbon];
     }
    }

    $bonusdata = $this->getBonusStatus($id, array_keys($data['potbonus']));
     $finalbonusdata = [];
      foreach(array_keys($data['potbonus']) as $bonus){
        if($data['potbonus'][$bonus] > 2){
        $paid = false;
        if(array_key_exists($bonus, $bonusdata)){
            $paid = true;
        }
        $amount = 0;
        if($data['potbonus'][$bonus]<= 6 ){
          $amount = 5000;
         }
         elseif($data['potbonus'][$bonus] <= 10 ){
          $amount = 15000;
         }
         else{
          $amount = 25000;
         }
        array_push($data['finalbonus'], ['month' => $bonus ,'prize' => $amount, 'students' => $data['potbonus'][$bonus], 'status' => $paid]);
        }
      }
      return $data;
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

    public function getAgentPromocode($id){
      $this->db->query('SELECT promo_code FROM agents WHERE id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row->promo_code;
    }

    public function getAgentStudents($id){
      $this->db->query('SELECT id, name, phone, agent, recruit_type, status, adv_commission, final_commission, created_at FROM students WHERE students.agent = :id UNION ALL SELECT id, name, phone, agent, recruit_type, status, adv_commission, final_commission, created_at FROM potential_students WHERE potential_students.agent = :id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    // Get Agent by SubAgent
    public function getAgentIDByPromocode($promocode){
          $this->db->query('SELECT * FROM agents WHERE promo_code = :promocode');
          // Bind value
          $this->db->bind(':promocode', $promocode);
    
          $row = $this->db->single();
          if($this->db->rowCount() > 0){
            return $row->id;
          } else {
            return NULL;
          } 
        }

    // Regsiter Login
    public function registerLoginAttempt($used_id, $used_password, $result, $type){
      $this->db->query('INSERT INTO login_attempts (user_id, type, result, used_id, used_password) VALUES(:user_id, :type, :result, :used_id, :used_password)');
      if($result != 1){
        $this->db->bind(':user_id',  "UNKOWN");
      }else{
      $this->db->bind(':user_id',  $_SESSION['user_id']);
      }
      $this->db->bind(':type',  $type);
      $this->db->bind(':result', $result);
      $this->db->bind(':used_id', $used_id);
      $this->db->bind(':used_password', password_hash($used_password, PASSWORD_BCRYPT));
     
      if($this->db->execute()){
        return true;
       
      } else {
        return false;
      }
    }

    public function getTrueAgentAndPotentialStudent($name, $studentname){
          $true_agent_potStudent = [
            'agent' => '',
            'potential_student' => 0
          ];
          $this->db->query('SELECT id, name FROM agents;');
    
          $results = $this->db->resultSet();
          $scores = array();
          $similars = array();
          $ids = array();
          
        for ($x = 0; $x < count($results); $x++) {
            $result = $results[$x];
            $comparedname = $result->name;
            if(empty(strpos($name, ' '))){
              $comparedname = substr($comparedname, 0, strpos($comparedname," "));
            }
           
            $sim = similar_text($name, $comparedname, $percent);
            // $result->digits = $sim;
            // $result->similarity = $percent;
            array_push($scores, $percent);
            array_push($ids, $result->id);
        }
        //print_r($scores);
        //print_r($ids);
        //print_r($scores);
        for ($x = 0; $x < count($scores) - 1; $x++){
          $max_idx = $x;
          for ($y = $x+1; $y < count($scores); $y++){
            if($scores[$y] < $scores[$max_idx]){
              $max_idx = $y;
            }
          }
          $temp = $scores[$max_idx];
          $tempres = $ids[$max_idx];
          $scores[$max_idx] = $scores[$x];
          $ids[$max_idx] = $ids[$x];
          $scores[$x] = $temp;
          $ids[$x] = $tempres;
        }

        //print_r($scores);
        //print_r($ids);

        $potagents = array();
        $n = 0;
        for($x = count($ids) - 1; $x >= 0; $x--){
          if(count($potagents) < 3){
            if($scores[$x] >= 60){
              array_push($potagents, $ids[$x]);
            }else{
              break;
            }
            
          }else{
            break;
          }
        }

        for($x = 0; $x < count($potagents); $x++){
          $this->db->query('SELECT id, name FROM potential_students WHERE agent = :agent;');
          $this->db->bind(':agent', $potagents[$x]);
          $results = $this->db->resultSet();
          $exists = false;
          if(count($results) > 0){
            foreach ($results as $potresult) {
              
              $studentcomparename = $studentname;
              if(empty(strpos($potresult->name, ' '))){
                $studentcomparename = substr($studentcomparename, 0, strpos($studentcomparename," "));
              }
              similar_text($potresult->name, $studentcomparename, $percent);
              if($percent >= 60){
               $exists = true;
               $true_agent_potStudent['agent'] = $potagents[$x];
               $true_agent_potStudent['potential_student'] = $potresult->id;
               break;
              }
            }
          }
          if($exists == true){
            break;
          }
        }
          // if(!empty($true_agent_potStudent)){
          //   print_r($true_agent_potStudent);
          // }
          return $true_agent_potStudent;
        }
  }