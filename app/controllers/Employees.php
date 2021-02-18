<?php
  class Employees extends Controller {
    public function __construct(){
      $this->employeeModel = $this->model('Employee');
      $this->fileModel = $this->model('File');
    }

    public function profile(){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
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

    public function openMyTask($taskid){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
      $this->view('employees/task_detail', $this->employeeModel->getTask($taskid) );
    }

    public function dashboard($section = ''){
      if(!isLoggedIn()){
        redirect('employees/login');
      }
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
        $data['tasks'] = $this->employeeModel->getAllTasks();
        $this->view('employees/all_tasks', $data);
      }


  
      public function delete_employees($id){
        // if(!empty($id)){
        //   $this->studentModel->deletePotentialStudent($id);
        // }
        redirect('employees/dashboard');
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