<?php
  class Controls extends Controller {
    public function __construct(){
      $this->adminModel = $this->model('Admin');
      $this->fileModel = $this->model('File');
      $this->studentModel = $this->model('Student');
    //   if(!isLoggedIn()){
    //     redirect('controls/login');
    //   }else{
    //       if($_SESSION['user_type'] != 0){
    //         redirect('controls/login');
    //       }
    //   }
    }

    public function index(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      redirect('controls/dashboard');
    }


    //getStudents
    public function students(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
        $data = $this->adminModel->getStudents();
        $this->view('controls/students', $data);
    }

    public function openagent($id){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $data = $this->adminModel->getAgent($id);
      $data->agent_err = '';
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $password = trim($_POST['password']);
        if($this->adminModel->changeAgentPassword($password, $id)){
          $this->view('controls/agent_detail', $data);
        }
        else{
          $data->agent_err = "Couldn't Change Password, Try Again.";
          $this->view('controls/agent_detail', $data);
        }

        
      }else{
      $this->view('controls/agent_detail', $data);
      }
    }

    public function payagent($id, $type, $amount, $agent){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $this->adminModel->payAgent($id, $type, $amount);
      redirect('controls/openagent/'.$agent);
    }
 

    

    public function openStudent($id){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $status = trim($_POST['status']);
        
      if($status != trim($_POST['current_status'])){
        if($this->adminModel->changeStatus($status, $id)){
          $data = $this->adminModel->getStudent($id);
          $data['status_err'] = "";
          $this->view('controls/student_detail', $data);
        }
        else{
          $data = $this->adminModel->getStudent($id);
          $data['status_err'] = "Couldn't Change Status, Try Again.";
          $this->view('controls/student_detail', $data);
        }
      }else{
        $data = $this->adminModel->getStudent($id);
        $data['status_err'] = "";
        $this->view('controls/student_detail', $data);
      }
      }else{
        $data = $this->adminModel->getStudent($id);
        $data['status_err'] = "";
        $this->view('controls/student_detail', $data);
      }
      
      
    }

    public function dashboard(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $data = $this->adminModel->getStudentStats();
      $data->agents = $this->adminModel->getAgentStats();
      $data->tasks = $this->adminModel->getTodaysTasks();
      usort($data->agents, function($a, $b) {return $b->totalmoney <=> $a->totalmoney;});
      $this->view('controls/dashboard', $data);
    }

    public function agents(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $data = $this->adminModel->getAgents();
      $this->view('controls/agents', $data);
    }

    public function employees(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $adddata =[
                'emp_id' => 'EMP'.strval(rand(100000, 999999)),
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
              ];
    
              $this->adminModel->registerEmployee($adddata);
            // Make sure errors are empty
        $data = $this->adminModel->getEmployees();
        $this->view('controls/employees', $data);
      }
      else{
      $data = $this->adminModel->getEmployees();
      $this->view('controls/employees', $data);
      }
    }

    public function openEmployee($id){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $data = $this->adminModel->getEmployee($id);
      $data->emp_err = '';
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $password = trim($_POST['password']);
        if($this->adminModel->changeEmpPassword($password, $id)){
          $this->view('controls/employee_detail', $data);
        }
        else{
          $data->emp_err = "Couldn't Change Password, Try Again.";
          $this->view('controls/employee_detail', $data);
        }

        
      }
      $this->view('controls/employee_detail', $data);
    }

    public function tasks(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $data['todays'] = $this->adminModel->getTodaysTasks();
      $data['alltasks'] = $this->adminModel->getAllTasks();
      $this->view('controls/tasks', $data);
    }

    public function openTask($taskid){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
      $this->view('controls/task_detail', $this->adminModel->getTask($taskid) );
    }

    public function addStudent(){
      if(!isLoggedIn()){
        redirect('controls/login');
      }
     
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $pass = true;
          // Process form
    
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $affiliate = trim($_POST['affiliate']);
          // Init data
          $data =[
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => '',
            'reason' => trim($_POST['reason']),
            'status' => trim($_POST['status']),
            'phone' => trim($_POST['phone']),
            'countries' => trim($_POST['countries']),
            'email_err' => '',
            'phone_err' => '',
            'files_err' => '',
            'type' => 1
          ];
          
          // Validate Email
          if(empty($data['email'])){
            $this->view('controls/add_student', $data);
          } else {
            // Check email
            if($this->studentModel->findStudentByEmail($data['email'])){
              $pass = false;
              $data['email_err'] = 'Email is already taken';
            }
          }
  
           // Validate Phone
           if(empty($data['phone'])){
            $this->view('controls/add_student', $data);
          } else {
            // Check email
            if($this->studentModel->findStudentByPhone($data['phone'])){
              $pass = false;
              $data['phone_err'] = 'Phone is already taken';
            }
          }
  
         // Make sure errors are empty
          if($pass){
            // Validated
            $targetDir = substr(APPROOT,0,37) ."\public\uploads\\files\\"; 
  
          $allowTypes = array('jpg','png','jpeg','pdf','docx', 'doc'); 
          $imageTypes = array('jpg','png','jpeg'); 
          $docTypes = array('pdf','docx', 'doc'); 
          
          $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
          $fileNames = array_filter($_FILES['files']['name']); 
          $totalSize = 0;
          if(!empty($fileNames)){ 
          foreach($_FILES['files']['name'] as $key=>$val){ 
              // File upload path 
              $fileName = basename($_FILES['files']['name'][$key]); 
              $fileSize = $_FILES['files']['size'][$key];
              $targetFilePath = $targetDir .$data['name'].$data['phone'].$fileName; 
               
              // Check whether file type is valid 
              $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
             
              if(in_array($fileType, $allowTypes)){
                 
                  // Upload file to server 
                 $totalSize += $fileSize;
              }else{ 
                  $errorUploadType .= $_FILES['files']['name'][$key].' | is not valid'; 
                  $data['files_err'] = $errorUploadType;
              break;
              } 
          }
          
          if($totalSize < 10485760){
          if($data['files_err'] == ''){
            foreach($_FILES['files']['name'] as $key=>$val){ 
              // File upload path 
              $textt = pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION); 
              $fileName = basename($_FILES['files']['name'][$key], '.'.$textt); 
              $computedFileName = $fileName."_____".$data['name']."_".$data['phone'].".".$textt; 
              $targetFilePath = $targetDir .$computedFileName;
               
              // Check whether file type is valid 
              $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
              if(in_array($fileType, $allowTypes)){ 
                  // Upload file to server 
                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                      // Image db insert sql 
                      $email = $data['email'];
                      $datatype = 0;
                      if(in_array($fileType, $imageTypes)){
                       $datatype = 1;
                      }elseif(in_array($fileType, $docTypes)){
                        $datatype = 2;
                      }
                      $insertValuesSQL .= "('".$computedFileName."','".$email."','".$datatype."'),"; 
                  }else{ 
                      $errorUpload .= $_FILES['files']['name'][$key].' | is not valid';
                      $data['files_err'] = $errorUpload;
                  break;
                  } 
              }else{ 
                  $errorUploadType .= $_FILES['files']['name'][$key].' | is not valid'; 
                  $data['files_err'] = $errorUploadType;
              break;
              } 
          }
           if($data['files_err'] == ''){
  
          if(!empty($insertValuesSQL)){ 
              $insertValuesSQL = trim($insertValuesSQL, ','); 
              
              if( $this->fileModel->addfiles($insertValuesSQL)){
                // Register User
              if($this->studentModel->registerByAdmin($data)){
                flash('register_success', 'You are registered and can log in');
                redirect('controls/students');
                
              } else {
              die('Something went wrong');
            }
              } else {
                $data['files_err'] = "Sorry, your data couldn't be uploaded.";
                $this->view('controls/add_student', $data);
               
              }
          } }
        
          else{
            
            $this->view('controls/add_student', $data);
      }}
          else{
            
                $this->view('controls/add_student', $data);
          }}else{
            $data['files_err'] = 'Total Size of your files is more than 10MB';
                $this->view('controls/add_student', $data);
          }
          
      }else{
        // Register User
        if($this->studentModel->registerByAdmin($data)){
          flash('register_success', 'You are registered and can log in');
          redirect('controls/students');
        } else {
        die('Something went wrong');
      }
    }
            
            
  
          } else {
            // Load view with errors
            $this->view('controls/add_student', $data);
          }
  
          
  
        } else {
          
  
          $data =[
            'name' => '',
            'email' => '',
            'password' => '',
            'reason' => '',
            'status' => '',
            'phone' => '',
            'countries' => '',
            'email_err' => '',
            'phone_err' => '',
            'files_err' => '',
            'type' => 1
          ];
  
          // Load view
          $this->view('controls/add_student', $data);
        }
      }



    public function login(){
        if(isLoggedIn()){
          redirect('controls/dashboard');
        }
        else{
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          // Init data
          $data =[
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'password_err' => '',      
          ];
  
          
          // Make sure errors are empty
          if(empty($data['password_err'])){
            // Validated
            // Check and set logged in user
            $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
  
            if($loggedInUser){
              // Create Session
              $this->createUserSession($loggedInUser);
            } else {
              $data['password_err'] = 'ID or Password is Incorrect.';
  
              $this->view('controls/login', $data);
            }
          } else {
            // Load view with errors
            $this->view('controls/login', $data);
          }
  
  
        } else {
          // Init data
          $data =[    
            'emp_id' => '',
            'password' => '',
            'password_err' => '',        
          ];
  
          // Load view
          $this->view('controls/login', $data);
        }
      }
      }

  
      public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_type'] = 0;
        $_SESSION['user_email'] = $user->user_name;
        $_SESSION['user_name'] = $user->name;
  
        redirect('controls/dashboard');
      }
  
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('controls/login');
      }

    
    
    
}