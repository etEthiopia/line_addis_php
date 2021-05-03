<?php
  class Contests extends Controller {
    public function __construct(){
        $this->fileModel = $this->model('File');
        $this->gallerycontestModel = $this->model('GalleryContest');
    }

    public function index(){
        redirect('contests/gallerylandingpage');
      }

      public function gallerylandingpage($section = ''){
        if($section == ''){
            $this->view('contests/gallery_landing' );
          }
         else{
          $this->view('contests/gallery_landing'.$section);
         }
      }

      



      public function galleryentryform(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pass = true;
            // Process form
      
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
              'name' => trim($_POST['name']),
              'phone' => trim($_POST['phone']),
              'members' => trim($_POST['members']),
              'email' => trim($_POST['email']),
              'city' => trim($_POST['city']),
              'university' => trim($_POST['university']),
              'name_err' => '',
              'email_err' => '',
              'phone_err' => '',
              'fileempty' => 0,
              'files_err' => ''
            ];
            
            // Validate Email
            if(empty($data['email'])){
                $this->view('contests/gallery_entry_form', $data);
              } else {
                // Check email
                if($this->gallerycontestModel->findGroupByEmail($data['email'])){
                  $pass = false;
                  $data['email_err'] = 'Email is already taken';
                }
              }
      
               // Validate Phone
               if(empty($data['phone'])){
                $this->view('contests/gallery_entry_form', $data);
              } else {
                // Check email
                if($this->gallerycontestModel->findGroupByPhone($data['phone'])){
                  $pass = false;
                  $data['phone_err'] = 'Phone is already taken';
                }
              }

              if(empty(array_filter($_FILES['files']['name']))){
                $pass = false;
                $data['file_err'] = 'Picture is Required';
                $this->view('contests/gallery_entry_form', $data);
              }
              
            
    
             
            
            
           // Make sure errors are empty
            if($pass){
              if(!empty(array_filter($_FILES['files']['name']))){
                $data['fileempty'] = 1;
              }
              // Validated
             $groupId = $this->gallerycontestModel->addGalleryGroup($data);
    
             
            $targetDir = substr(APPROOT,0,37) ."\public\uploads\\contest_files\\"; 
    
            $allowTypes = array('jpg','png','jpeg', 'zip');
            
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
                    if($this->gallerycontestModel->deleteGroup($groupId)){
                      $this->view('contests/gallery_entry_form', $data );
                      
                    } else {
                        $this->view('contests/gallery_entry_form', $data );
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
                       $email = $data['email'];
                        $insertValuesSQL .= "('".$computedFileName."','".$groupId."','".$email."'),"; 
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
              if($this->gallerycontestModel->deleteGroup($groupId)){
                $this->view('contests/gallery_entry_form', $data );
              } else {
                $this->view('contests/gallery_entry_form', $data );
            }
            }
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                
                if($this->fileModel->addGalleryContestGroupFiles($insertValuesSQL)){
                  // Register User
                  $this->view('contests/success');
                 
                }
            } else{
              if($this->gallerycontestModel->deleteGroup($groupId)){
                $this->view('contests/gallery_entry_form', $data );
                
              } else {
                $this->view('contests/gallery_entry_form', $data );
            }
            }
          }
            else{
              if($this->gallerycontestModel->deleteGroup($groupId)){
                $this->view('contests/gallery_entry_form', $data );
              } else {
                $this->view('contests/gallery_entry_form', $data );
            }
             }
            }else{
              $data['files_err'] = 'Total Size of your files is more than 10MB';
              if($this->gallerycontestModel->deleteGroup($groupId)){
                $this->view('contests/gallery_entry_form', $data );
              } else {
                $this->view('contests/gallery_entry_form', $data );
            }
            }
            
        } else{
            $this->view('contests/success');
      }
            } else{
                $this->view('contests/gallery_entry_form', $data );
        }
           
        }
        else {
          $data =[
            'name' => '',
            'phone' => '',
            'members' => '',
            'email' =>'',
            'city' => '',
            'university' => '',
            'phone_err' => '',
            'name_err' => '',
            'email_err' => '',
            'fileempty' => 0,
            'files_err' => ''
          ];
    
          
            $this->view('contests/gallery_entry_form', $data );
         
        }
        $this->view('contests/gallery_entry_form');
      }

}

?>