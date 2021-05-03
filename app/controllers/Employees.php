<?php
  class Employees extends Controller {
    public function __construct(){
      $this->employeeModel = $this->model('Employee');
      $this->fileModel = $this->model('File');
      $this->studentModel = $this->model('Student');
      $this->agentModel = $this->model('Agent');
    }

    
    public function index(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          redirect('employees/dashboard');
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
    }

    public function profile(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = [
            'tasks' => $this->employeeModel->getNumberOfTasks($_SESSION['user_id']),
            'emp_err' => ''
          ];
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $password = trim($_POST['password']);
            if($this->employeeModel->updatePassword($password)){
              $this->view('employees/profile', $data);
            }
            else{
              $data['emp_err'] = "Couldn't Change Password, Try Again.";
              $this->view('employees/profile', $data);
            }
    
            
          }else{
            $this->view('employees/profile', $data);
          }
    
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }

      
    }

    public function openMyContact($contactId){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = $this->employeeModel->getContact($contactId);
          if($data != null){
            $this->view('employees/contact_detail', $data);
          }
          else{
            redirect('employees/contacts');
          }
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
    }

    
    public function openMyTask($taskid){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $this->view('employees/task_detail', $this->employeeModel->getTask($taskid) );
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
    }

    //getStudents
    public function students(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = $this->employeeModel->getStudents();
        $this->view('employees/students', $data);
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
        
    }

    public function agents(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = $this->employeeModel->getAgents();
          $this->view('employees/agents', $data);
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
     
    }

    
    public function openagent($id){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
     
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = $this->employeeModel->getAgent($id);
          $data->agent_err = '';
          
          $this->view('employees/agent_detail', $data);
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
      
    }

    
    public function openStudent($id){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
     elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $data = $this->employeeModel->getStudent($id);
        $data['status_err'] = "";
        $this->view('employees/student_detail', $data);
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
      
      
    }

    public function addStudent(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
     
     elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
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
              'promocode' => trim($_POST['promocode']),
              'agent' => trim($_POST['agent']),
              'info' => trim($_POST['info']),
              'others' => trim($_POST['others']),
              'email_err' => '',
              'promocode_err' => '',
              'phone_err' => '',
              'files_err' => '',
              'type' => 5
            ];
            
            // // Validate Email
            // if(empty($data['email'])){
            //   $this->view('employees/add_student', $data);
            // } else {
            //   // Check email
            //   if($this->studentModel->findStudentByEmail($data['email'])){
            //     $pass = false;
            //     $data['email_err'] = 'Email is already taken';
            //   }
            // }
    
             // Validate Phone
             if(empty($data['phone'])){
              $this->view('employees/add_student', $data);
            } else {
              // Check email
              if($this->studentModel->findStudentByPhone($data['phone'])){
                $pass = false;
                $data['phone_err'] = 'Phone is already taken';
              }
            }

            $data['type'] = 5;
            if($data['promocode'] != ''){
              $validagent  = $this->agentModel->getAgentIDByPromocode($data['promocode']);
              if($validagent == NULL){
                $pass = false;
                $data['promocode_err'] = 'Invalid Promocode';
              }else{
                $data['studentagent'] = $validagent;
                $data['type'] = 3;
              }
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
                if($this->studentModel->registerByAdmin($data, $this->agentModel)){
                  flash('register_success', 'You are registered and can log in');
                  redirect('employees/students');
                  
                } else {
                die('Something went wrong');
              }
                } else {
                  $data['files_err'] = "Sorry, your data couldn't be uploaded.";
                  $this->view('employees/add_student', $data);
                 
                }
            } }
          
            else{
              
              $this->view('employees/add_student', $data);
        }}
            else{
              
                  $this->view('employees/add_student', $data);
            }}else{
              $data['files_err'] = 'Total Size of your files is more than 10MB';
                  $this->view('employees/add_student', $data);
            }
            
        }else{
          // Register User
          if($this->studentModel->registerByAdmin($data, $this->agentModel)){
            flash('register_success', 'You are registered and can log in');
            redirect('employees/students');
          } else {
          die('Something went wrong');
        }
      }
              
              
    
            } else {
              // Load view with errors
              $this->view('employees/add_student', $data);
            }
    
            
    
          } else {
            
    
            $data =[
              'name' => '',
              'email' => '',
              'password' => '',
              'reason' => '',
              'status' => '',
              'phone' => '',
              'promocode' =>'',
              'agent' => '',
              'info' => '',
              'others' => '',
              'countries' => '',
              'email_err' => '',
              'phone_err' => '',
              'files_err' => '',
              'promocode_err' => '',
              'type' => 5
            ];
    
            // Load view
            $this->view('employees/add_student', $data);
          }
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
     
      
      }


    
      public function contacts($section = ''){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $contactList = $this->employeeModel->getAllContacts();
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pass = true;
            // Process form
      
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            //$affiliate = trim($_POST['affiliate']);
            // Init data
            $data =[
              'name' => trim($_POST['name']),
              'address' => trim($_POST['address']),
              'name_err' => '',
              'address_err' => '',
              'reason' => trim($_POST['reason']),
              'reason_err' => '',
              'type' => trim($_POST['type']),
              'type_err' => '',
              'contacts' => $contactList
            ];
            
            // Validate Email
            if(empty($data['reason'])){
              $pass = false;
              $data['reason_err'] = 'Reason Cannot be Empty';
              $section = 'form1-4w';
              $this->view('employees/contacts'.$section, $data);
            } 
            if($pass){
              if($this->employeeModel->addContact($data)){
                $data['contacts'] = $this->employeeModel->getAllContacts();
                $this->view('employees/contacts', $data);
              }
              else{
                $data['reason_err'] = 'Reason Cannot be Empty';
                $section = 'form1-4w';
                $this->view('employees/contacts'.$section, $data);
              }
            }

          }
          else{
          $data =[
            'name' => '',
            'address' => '',
            'name_err' => '',
            'address_err' => '',
            'reason' => '',
            'reason_err' => '',
            'type' => '',
            'type_err' => '',
            'contacts' => $contactList
          ];
    
          if($section == ''){
            $this->view('employees/contacts', $data );
          }
         else{
          $this->view('employees/contacts'.$section, $data);
         }
        }
        }
      }
    }

    public function dashboard($section = ''){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      elseif(!empty($_SESSION['user_type'])){
        if($_SESSION['user_type'] == 2){
          $taskList = $this->employeeModel->getTodaysTasks();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //$affiliate = trim($_POST['affiliate']);
        // Init data
        $data =[
          'title' => trim($_POST['title']),
          'description' => trim($_POST['description']),
          'title_err' => '',
          'fileempty' => 0,
          'description_err' => '',
          'files_err' => '',
          'tasks' => $taskList
        ];
        
        // Validate Email
        if(empty($data['title'])){
          $pass = false;
          $data['title_err'] = 'Title Cannot be Empty';
          if($section == ''){
            $this->view('employees/dashboard', $data );
          }
         else{
          $this->view('employees/dashboard'.$section, $data);
         }
         
        } 
        

         // Validate Phone
         if(empty($data['description'])){
          $pass = false;
          $data['description_err'] = 'Description Cannot be Empty';
          if($section == ''){
            $this->view('employees/dashboard', $data );
          }
         else{
          $this->view('employees/dashboard'.$section, $data);
         }
        }
        
        
       // Make sure errors are empty
        if($pass){
          if(!empty(array_filter($_FILES['files']['name']))){
            $data['fileempty'] = 1;
          }
          // Validated
         $taskId = $this->employeeModel->addTask($data);

         
        $targetDir = substr(APPROOT,0,37) ."\public\uploads\\task_files\\"; 

        $allowTypes = array('jpg','png','jpeg','pdf','docx', 'doc','wav', 'mp3', 'm4a', 'flac', 'wma', 'aac');
        $allowPictureTypes = array('jpg','png','jpeg'); 
        $allowDocTypes = array('docx', 'doc', 'pdf');
        $allowVoiceTypes = array('wav', 'mp3', 'm4a', 'flac', 'wma', 'aac');
        
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        $fileNames = array_filter($_FILES['files']['name']); 
        $totalSize = 0;




        if(!empty($fileNames)){ 
          $objDateTime = new DateTime('NOW');
          $timestamp = $objDateTime->format('Y_m_d_H_i_s');
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $fileSize = $_FILES['files']['size'][$key];
            $targetFilePath = $targetDir.$timestamp.$fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){
              $totalSize += $fileSize;
            }
            else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | is not valid'; 
                $data['files_err'] = $errorUploadType;
                if($this->employeeModel->deleteTask($taskId)){
                  if($section == ''){
                    $this->view('employees/dashboard', $data );
                  }
                 else{
                  $this->view('employees/dashboard'.$section, $data);
                 }
                } else {
                  if($section == ''){
                    $this->view('employees/dashboard', $data );
                  }
                 else{
                  $this->view('employees/dashboard'.$section, $data);
                 }
              }
            break;
            } 
        }
        
        if($totalSize < 10485760){
        if($data['files_err'] == ''){
          try{
          foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $computedFileName = $timestamp.$fileName; 
            $targetFilePath = $targetDir .$computedFileName;
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
               if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    //$email = $data['email'];
                    $type = 0;
                    if(in_array($fileType, $allowPictureTypes)){
                      $type = 1;
                    }
                    elseif(in_array($fileType, $allowDocTypes)){
                      $type = 2;
                    }
                    elseif(in_array($fileType, $allowVoiceTypes)){
                      $type = 3;
                    }
                    $empidd = $_SESSION['user_id'];
                    
                    //(dir, emp_id, task_id, type)
                    $insertValuesSQL .= "('".$computedFileName."','".$empidd."','".$taskId."','".$type."'),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | is not vallid';
                    $data['files_err'] = $errorUpload;
                break;
                } 
                
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | is not valllid'; 
                $data['files_err'] = $errorUploadType;
            break;
            } 
        }}
        catch (Exception $e){
          if($this->employeeModel->deleteTask($taskId)){
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
          } else {
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
        }
        }
         

        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            
            if($this->fileModel->addTaskFiles($insertValuesSQL)){
              // Register User
              $data['tasks'] = $taskList = $this->employeeModel->getTodaysTasks();
              $this->view('employees/dashboard', $data );
              
            }
             else {
              $data['files_err'] = "Sorry, your data couldn't be uploaded.";
              if($section == ''){
                $this->view('employees/dashboard', $data );
              }
             else{
              $this->view('employees/dashboard'.$section, $data);
             }
             
            }

           
           
        } else{
          if($this->employeeModel->deleteTask($taskId)){
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
          } else {
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
        }
        }
      }
        else{

          
          if($this->employeeModel->deleteTask($taskId)){
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
          } else {
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
        }
         }
        }else{
          $data['files_err'] = 'Total Size of your files is more than 10MB';
          if($this->employeeModel->deleteTask($taskId)){
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
          } else {
            if($section == ''){
              $this->view('employees/dashboard', $data );
            }
           else{
            $this->view('employees/dashboard'.$section, $data);
           }
        }
        }
        
    } else{
      // Register User
      $data['tasks'] = $taskList = $this->employeeModel->getTodaysTasks();
      $this->view('employees/dashboard', $data );  
  }
        } else{
          // Register User
          if($section == ''){
            $this->view('employees/dashboard', $data );
          }
         else{
          $this->view('employees/dashboard'.$section, $data);
         }
    }
       
    }
    else {
      $data =[
        'title' => '',
        'description' => '',
        'title_err' => '',
        'description_err' => '',
        'files_err' => '',
        'fileempty' => 0,
        'tasks' => $taskList
      ];

      if($section == ''){
        $this->view('employees/dashboard', $data );
      }
     else{
      $this->view('employees/dashboard'.$section, $data);
     }
    }
        }
        else{
        $this->view('pages/index');
      }
      }else{
        $this->view('pages/index');
      }
      
  }


      
    public function login(){
        if(isLoggedIn()){
          redirect('employees/dashboard');
        }
        else{
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          // Init data
          $data =[
            'emp_id' => trim($_POST['emp_id']),
            'password' => trim($_POST['password']),
            'password_err' => '',      
          ];
  
          // Check for user/email
          if($this->employeeModel->findEmployeeByEmpId($data['emp_id'])){
            // User found
          } else {
            // User not found
            $data['password_err'] = 'ID / Password is Incorrect.';
          }
  
          // Make sure errors are empty
          if(empty($data['password_err'])){
            // Validated
            // Check and set logged in user
            $loggedInUser = $this->employeeModel->login($data['emp_id'], $data['password']);
  
            if($loggedInUser){
              // Create Session
              $this->createUserSession($loggedInUser);
            } else {
              $data['password_err'] = 'ID or Password is Incorrect.';
  
              $this->view('employees/login', $data);
            }
          } else {
            // Load view with errors
            $this->view('employees/login', $data);
          }
  
  
        } else {
          // Init data
          $data =[    
            'emp_id' => '',
            'password' => '',
            'password_err' => '',        
          ];
  
          // Load view
          $this->view('employees/login', $data);
        }
      }
      }

      public function alltasks(){
        if(!isLoggedIn()){
          redirect('employees/login');
        }
        
        elseif(!empty($_SESSION['user_type'])){
          if($_SESSION['user_type'] == 2){
            $data['tasks'] = $this->employeeModel->getAllTasks();
        $this->view('employees/all_tasks', $data);
          }
          else{
          $this->view('pages/index');
        }
        }else{
          $this->view('pages/index');
        }
      }


      public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_type'] = 2;
        $_SESSION['user_email'] = $user->emp_id;
        $_SESSION['user_name'] = $user->name;
  
        redirect('employees/dashboard');
      }
  
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('employees/login');
      }

    
    
    
}