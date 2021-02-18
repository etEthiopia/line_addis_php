<?php
  class Employee {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Register
    public function register($data){
      // $this->db->query('INSERT INTO admins (name, user_name, email, phone, password, type, status) VALUES(:name, :username, :email, :phone, :password, :type, :status)');
      //   $this->db->bind(':name', $data['name']);
      //   $this->db->bind(':username', 'jossy');
      //   $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
      //   $this->db->bind(':email', 'yosef@lineaddis.com');
      //   $this->db->bind(':phone', '0915192602');
      //   $this->db->bind(':type', 1);
      //   $this->db->bind(':status', 1);
      //   if($this->db->execute()){
      //       return true;
      //     } else {
      //       return false;
      //     }

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

    // Add Task 
    public function addTask($data){
      $this->db->query('INSERT INTO tasks (title, description, emp_id, emp_name, file) VALUES(:title, :description, :emp_id, :emp_name, :file)');
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':emp_id', $_SESSION['user_id']);
      $this->db->bind(':emp_name', $_SESSION['user_name']);
      $this->db->bind(':file', $data['fileempty']);
      if($this->db->execute()){
        $this->db->query('SELECT * FROM tasks WHERE emp_id = :emp_id ORDER BY id DESC LIMIT 1');
        // Bind value
        $this->db->bind(':emp_id', $_SESSION['user_id']);
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

    public function getFiles($taskid){
      $this->db->query('SELECT * FROM task_files WHERE task_id = :id');
         $this->db->bind(':id', $taskid);

        $row = $this->db->single();
        // Check row
        return $this->db->resultSet();
    }

    public function getTodaysTasks(){
      $objDateTime = new DateTime('NOW');
      $timestamp = $objDateTime->format('Y-m-d');
      $this->db->query('SELECT * FROM tasks WHERE emp_id = :empid AND date = :today ORDER BY id DESC');
      $this->db->bind(':empid', $_SESSION['user_id']);
      $this->db->bind(':today', $timestamp);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getAllTasks(){
      $this->db->query('SELECT * FROM tasks WHERE emp_id = :empid ORDER BY id DESC');
      $this->db->bind(':empid', $_SESSION['user_id']);
      $results = $this->db->resultSet();
      return $results;
    }

    public function deleteTask($id){
      $this->db->query('DELETE FROM tasks WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Change Password
    public function changePassword($password, $id){
        $this->db->query('UPDATE employees SET password = :password WHERE id = :id');
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
         
        } else {
          return false;
        }
      
      
    }

        // Find employee by emp_id
    public function findEmployeeByEmpId($empId){
        $this->db->query('SELECT * FROM employees WHERE emp_id = :emp_id');
        // Bind value
        $this->db->bind(':emp_id', $empId);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

    public function getEmployeeById($id)
    {
      $this->db->query('SELECT * FROM employees WHERE id = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() == 1){
          return $row;
        } else {
          return false;
        }
    }

    public function updatePassword($password){
      $this->db->query('UPDATE employees SET password = :password WHERE id = :id');
        $this->db->bind(':password', password_hash($password, PASSWORD_BCRYPT));
        $this->db->bind(':id', $_SESSION['user_id']);
        if($this->db->execute()){
          return true; 
        } else {
          return false;
        }
      }

    public function getNumberOfTasks($id){
      $this->db->query('SELECT COUNT(id) AS taskcount FROM `tasks` WHERE emp_id =:id');
      $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
          return $row->taskcount;
        } else {
          return 0;
      }
    }

    // Login Employee
    public function login($empId, $password){
        $this->db->query('SELECT * FROM employees  WHERE emp_id = :emp_id');
        $this->db->bind(':emp_id', $empId);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
          return $row;
        } else {
          return false;
        }
    }

    
  }