<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->fileModel = $this->model('File');
    }


    public function register($affiliate = ''){
      
      $data = [
        'affiliate' => $affiliate
      ];

     
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'affiliate' => $affiliate,
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'reason' => trim($_POST['reason']),
          'phone' => trim($_POST['phone']),
          'email_err' => '',
          'phone_err' => '',
          'files_err' => '',
          'type' => 1
        ];

        // Validate Email
        if(empty($data['email'])){
          $this->view('user/register', $data);
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $pass = false;
            $data['email_err'] = 'Email is already taken';
          }
        }

         // Validate Phone
         if(empty($data['phone'])){
          $this->view('user/register', $data);
        } else {
          // Check email
          if($this->userModel->findUserByPhone($data['phone'])){
            $pass = false;
            $data['phone_err'] = 'Phone is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $this->view('user/register', $data);
        }

        // Validate Password
        if(empty($data['password'])){
          $this->view('user/register', $data);
        }

        // Make sure errors are empty
        if($pass){
          // Validated
          $targetDir = substr(APPROOT,0,37) ."\public\uploads\\"; 

        $allowTypes = array('jpg','png','jpeg','pdf','docx', 'doc'); 
        
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
            $fileName = basename($_FILES['files']['name'][$key]); 
            $computedFileName = $data['name'].$data['phone'].$fileName; 
            $targetFilePath = $targetDir .$computedFileName;
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
               if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $email = $data['email'];
                    $insertValuesSQL .= "('".$computedFileName."','".$email."'),"; 
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
            if($this->userModel->register($data)){
              flash('register_success', 'You are registered and can log in');
              $this->view('users/success_user');
              
            } else {
            die('Something went wrong');
          }
            } else {
              $data['files_err'] = "Sorry, your data couldn't be uploaded.";
              $this->view('users/register', $data);
             
            }

           
           
        } }
      
        else{
          
          $this->view('users/register', $data);
    }}
        else{
          
              $this->view('users/register', $data);
        }}else{
          $data['files_err'] = 'Total Size of your files is more than 10MB';
              $this->view('users/register', $data);
        }
        
    }else{
      // Register User
      if($this->userModel->register($data)){
        flash('register_success', 'You are registered and can log in');
        $this->view('users/success_user');
      } else {
      die('Something went wrong');
    }
  }
          
          

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data

        $data =[
          'affiliate' => $affiliate,
          'name' => '',
          'email' => '',
          'password' => '',
          'reason' => '',
          'phone' => '',
          'email_err' => '',
          'phone_err' => '',
          'files_err' => '',
          'type' => 1
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function user_success(){
      $this->view('users/success_user');
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'password_err' => '',      
        ];

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'Email or Password is Incorrect.';
        }

        // Make sure errors are empty
        if(empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Email or Password is Incorrect.';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->type;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;

      redirect('posts');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }
  }