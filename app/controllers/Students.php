<?php
  class Students extends Controller {
    public function __construct(){
      $this->studentModel = $this->model('Student');
      $this->agentModel = $this->model('Agent');
      $this->fileModel = $this->model('File');
    }

    public function index(){
      redirect('students/register');
    }

    public function register($affiliate = ''){
      
     
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $affiliate = trim($_POST['affiliate']);
        // Init data
        $data =[
          'affiliate' => $affiliate,
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => '',
          'reason' => trim($_POST['reason']),
          'phone' => trim($_POST['phone']),
          'countries' => trim($_POST['countries']),
          'promocode' => trim($_POST['promocode']),
          'info' => trim($_POST['info']),
          'agent' => trim($_POST['agent']),  
          'others' => trim($_POST['others']),
          'studentagent' => '',
          'email_err' => '',
          'phone_err' => '',
          'promocode_err' => '',
          'files_err' => '',
          'type' => 1
        ];
        
        // Validate Email
        if(empty($data['email'])){
          $this->view('students/register', $data);
        } else {
          // Check email
          if($this->studentModel->findStudentByEmail($data['email'])){
            $pass = false;
            $data['email_err'] = 'Email is already taken';
          }
        }

         // Validate Phone
         if(empty($data['phone'])){
          $this->view('students/register', $data);
        } else {
          // Check email
          if($this->studentModel->findStudentByPhone($data['phone'])){
            $pass = false;
            $data['phone_err'] = 'Phone is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $this->view('students/register', $data);
        }
        $data['type'] = 1;
        if($data['promocode'] != ''){
          $validagent  = $this->agentModel->getAgentIDByPromocode($data['promocode']);
          if($validagent == NULL){
            $pass = false;
            $data['promocode_err'] = 'Invalid Promocode';
          }else{
            $data['studentagent'] = $validagent;
            $data['type'] = 3;
          }
        } elseif($data['affiliate'] != ''){
          $data['studentagent'] = $data['affiliate'];
          $data['type'] = 2;
        } elseif($data['agent'] != ''){
          $data['studentagent'] = '';
          $data['type'] = 4;
        }
        
        
        if($data['others'] != ''){
          $data['info'] = $data['others'];
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
            if($this->studentModel->register($data, $this->agentModel)){
              flash('register_success', 'You are registered and can log in');
              $this->view('students/success');
              
            } else {
            die('Something went wrong');
          }
            } else {
              $data['files_err'] = "Sorry, your data couldn't be uploaded.";
              $this->view('students/register', $data);
             
            }

           
           
        } }
      
        else{
          
          $this->view('students/register', $data);
    }}
        else{
          
              $this->view('students/register', $data);
        }}else{
          $data['files_err'] = 'Total Size of your files is more than 10MB';
              $this->view('students/register', $data);
        }
        
    }else{
      // Register User
      if($this->studentModel->register($data, $this->agentModel)){
        flash('register_success', 'You are registered and can log in');
        $this->view('students/success');
      } else {
      die('Something went wrong');
    }
  }
          
          

        } else {
          // Load view with errors
          $this->view('students/register', $data);
        }

        

      } else {
        

        $data =[
          'affiliate' => $affiliate,
          'name' => '',
          'email' => '',
          'password' => '',
          'reason' => '',
          'phone' => '',
          'countries' => '',
          'promocode' => '',
          'info' =>'',
          'agent' => '',  
          'others' => '',
          'studentagent' => '',
          'email_err' => '',
          'phone_err' => '',
          'files_err' => '',
          'promocode_err' => '',
          'type' => 1
        ];

        // Load view
        $this->view('students/register', $data);
      }
    }

    public function success(){
      $this->view('students/success');
    }

    // public function login(){
    //   // Check for POST
    //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // Process form
    //     // Sanitize POST data
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
    //     // Init data
    //     $data =[
    //       'email' => trim($_POST['email']),
    //       'password' => trim($_POST['password']),
    //       'password_err' => '',      
    //     ];

    //     // Check for user/email
    //     if($this->studentModel->findStudentByEmail($data['email'])){
    //       // User found
    //     } else {
    //       // User not found
    //       $data['password_err'] = 'Email / Password is Incorrect.';
    //     }

    //     // Make sure errors are empty
    //     if(empty($data['password_err'])){
    //       // Validated
    //       // Check and set logged in user
    //       $loggedInUser = $this->studentModel->login($data['email'], $data['password']);

    //       if($loggedInUser){
    //         // Create Session
    //         $this->createUserSession($loggedInUser);
    //       } else {
    //         $data['password_err'] = 'Email or Password is Incorrect.';

    //         $this->view('studentslogin', $data);
    //       }
    //     } else {
    //       // Load view with errors
    //       $this->view('studentslogin', $data);
    //     }


    //   } else {
    //     // Init data
    //     $data =[    
    //       'email' => '',
    //       'password' => '',
    //       'password_err' => '',        
    //     ];

    //     // Load view
    //     $this->view('students/login', $data);
    //   }
    // }

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
      redirect('studentslogin');
    }
  }
?>