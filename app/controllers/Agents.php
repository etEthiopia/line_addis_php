<?php
  class Agents extends Controller {
    public function __construct(){
      $this->agentModel = $this->model('Agent');
      $this->studentModel = $this->model('Student');
    }

    

    public function form($data = []){
      if($data == []){
      $data = [
        'name' => '',
        'email' =>'',
        'phone' => '',
        'bankname' => '',
        'bankaccount' => '',
        'email_err' => '',
        'phone_err' => ''
      ];
    }
      $this->view('agents/form', $data);
    }
    
    public function profile(){
      if(!isLoggedIn()){
        redirect('agents/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'bank_name' => trim($_POST['bankname']),
          'bank_account' => trim($_POST['bankaccount']),
          'password' => trim($_POST['password']),
          'picture' => '',
          'email_err' => '',
          'phone_err' => '',
          'password_err' => '',
          'picture_err' => '',
          'student_err' => ''
        ];
        $data['profile'] = $this->agentModel->getAgentById($_SESSION['user_id']);
        // Validate data
        if(empty($data['name'])){
          $this->view('agents/profile', $data);
        }
        if(empty($data['email'])){
          $this->view('agents/profile', $data);
        }
        if($this->agentModel->findAnotherAgentByEmail($data['email'], $_SESSION['user_id'])){
          $pass = false;
          $data['email_err'] = 'Email is already taken';
          $data['student_err'] = 'Error: Email is already taken';
        }
        if($this->agentModel->findAnotherAgentByPhone($data['phone'], $_SESSION['user_id'])){
          $pass = false;
          $data['phone_err'] = 'Phone is already taken';
          $data['student_err'] = 'Error: Phone is already taken';
        }
        if($pass){
          $secondPass = true;
          if(trim($_POST['bankaccount']) != strval($data['profile']->bank_account)){
          if(trim($_POST['bankname']) == "Other Bank"){
            $data['bank_name'] = trim($_POST['otherbank']);
          }
          else{
            $data['bank_name'] = trim($_POST['bankname']);
          }}else{
            $data['bank_name'] = $data['profile']->bank_name;
          }
          $lists = array();
          if(!empty($data['password'])){
            array_push($lists, "password");
          }
          $fileName = $_FILES["picture"]["name"]; 
          $targetFilePath = '';
          if(!empty($fileName)){
            $targetDir = substr(APPROOT,0,37) ."\public\uploads\agents\\"; 
            $allowTypes = array('jpg','png','jpeg'); 
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $targetFilePath = $targetDir .$data['name'].$data['phone'].$fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            $fileSize = $_FILES['picture']['size'];
            if(in_array($fileType, $allowTypes)){
             if($fileSize < 2097152){
              if(move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)){ 
                $data['picture'] = $data['name'].$data['phone'].$fileName; 
                array_push($lists, "picture");
              }else{ 
                $secondPass = false;
                $errorUpload .= $_FILES['picture']['name'].' | is not valid';
                $data['picture_err'] = $errorUpload;
                $data['student_err'] = 'Error: '.$errorUpload;
            } 
             }else{ 
              $secondPass = false;
              $errorUpload .= 'Picture Must Be Less Than 2MB';
              $data['picture_err'] = $errorUpload;
              $data['student_err'] = 'Error: '.$errorUpload;
          } 
            } else{ 
              $secondPass = false;
              $errorUpload .= 'Picture Should be .jpg .png .jpeg';
              $data['picture_err'] = $errorUpload;
              $data['student_err'] = 'Error: '.$errorUpload;
          } 
           
          }
          if($secondPass){
          if($this->agentModel->update($data, $_SESSION['user_id'], $lists)){
            redirect('agents/profile');
          } else {
            $data['student_err'] = 'Registeration is Unsuccessful'; 
            $this->view('agents/profile', $data);
          }}else{
            $this->view('agents/profile', $data);
          }
        } else {
          $this->view('agents/profile', $data);
        }
      } else{
        $fetched = $this->agentModel->getAgentById($_SESSION['user_id']);
        $data = [
          'name' => $fetched->name,
          'email' => $fetched->email,
          'phone' => $fetched->phone,
          'bank_name' => '',
          'bank_account' => $fetched->bank_account,
          'password' => '',
          'picture' => '',
          'email_err' => '',
          'phone_err' => '',
          'password_err' => '',
          'picture_err' => '',
          'student_err' => '',
          'profile' => $fetched
        ];
        
        $this->view('agents/profile', $data);
      }
    }

    public function testing(){
      
      $error = '';
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'name' => trim($_POST['name']),
          'phone' => trim($_POST['phone']),
          'list' => [],
          'email_message' => ''
        ];
        require APPROOT .'/libraries/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'mail.lineaddis.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 587;								//Sets the default SMTP server port
        $mail->SMTPAuth = true;		
        $name = 'Agent Testing';
        $email = 'daginegussu@gmail.com';
        $password = 'password12345';					//Sets SMTP authentication. Utilizes the Username and Password variables
       // $mail->SMTPDebug = 3;
       // $mail->SMTPKeepAlive = true;   
        $mail->Username = 'hello@lineaddis.com';					//Sets SMTP username
        $mail->Password = 'linehelloaddis2021';					//Sets SMTP password
        $mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'hello@lineaddis.com';					//Sets the From email address for the message
        $mail->FromName = 'Line Addis | Agent Support';				//Sets the From name of the message
        $mail->AddAddress($email, 'Client');		//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML				
        $mail->Subject = "Line Addis - Agent Credentials";				//Sets the Subject of the message
        $mail->Body = "<!doctype html>
        <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'
            xmlns:o='urn:schemas-microsoft-com:office:office'>
        
        <head>
            <title>
            </title>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <style type='text/css'>
                #outlook a {
                    padding: 0;
                }
        
                .ReadMsgBody {
                    width: 100%;
                }
        
                .ExternalClass {
                    width: 100%;
                }
        
                .ExternalClass * {
                    line-height: 100%;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
            </style>
            <!--[if !mso]><!-->
            <style type='text/css'>
                @media only screen and (max-width:480px) {
                    @-ms-viewport {
                        width: 320px;
                    }
        
                    @viewport {
                        width: 320px;
                    }
                }
            </style>
            <!--<![endif]-->
            <!--[if mso]> 
            <xml> 
              <o:OfficeDocumentSettings> 
                <o:AllowPNG/> 
                <o:PixelsPerInch>96</o:PixelsPerInch> 
              </o:OfficeDocumentSettings> 
            </xml>
            <![endif]-->
            <!--[if lte mso 11]> 
            <style type='text/css'> 
              .outlook-group-fix{width:100% !important;}
            </style>
            <![endif]-->
            <style type='text/css'>
                @media only screen and (max-width:480px) {
        
                    table.full-width-mobile {
                        width: 100% !important;
                    }
        
                    td.full-width-mobile {
                        width: auto !important;
                    }
        
                }
        
                @media only screen and (min-width:480px) {
                    .dys-column-per-90 {
                        width: 90% !important;
                        max-width: 90%;
                    }
                }
            </style>
        </head>
        
        <body>
            <div>
                <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation'
                    style='background:#f7f7f7;background-color:#f7f7f7;width:100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <div style='margin:0px auto;max-width:600px;'>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation'
                                        style='width:100%;'>
                                        <tbody>
                                            <tr>
                                                <td
                                                    style='direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;'>
                                                    <!--[if mso | IE]>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td style='vertical-align:top;width:540px;'>
        <![endif]-->
                                                    <div class='dys-column-per-90 outlook-group-fix'
                                                        style='direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' role='presentation'
                                                            width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style='background-color:#ffffff;border:1px solid #ccc;padding:45px 75px;vertical-align:top;'>
                                                                        <table border='0' cellpadding='0' cellspacing='0'
                                                                            role='presentation' style='' width='100%'>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'>
                                                                                    <table border='0' cellpadding='0'
                                                                                        cellspacing='0' role='presentation'
                                                                                        style='border-collapse:collapse;border-spacing:0px;'>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style='width:130px;'>
                                                                                                    <img alt='LINE ADDIS'
                                                                                                        height='auto'
                                                                                                        src='https://lineaddis.com/assets/images/line-addis-logo-122x54.png'
                                                                                                        style='border:1px solid #ccc;border-radius:5px;display:block;font-size:13px;height:auto;outline:none;text-decoration:none;width:100%;'
                                                                                                        width='130' />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'>
                                                                                    <div
                                                                                        style='color:#777777;font-family:Oxygen, Helvetica neue, sans-serif;font-size:14px;line-height:21px;text-align:center;'>
                                                                                        <a href
                                                                                            style='display:block; color: #ff6f6f; font-weight: bold; text-decoration: none;'>
                                                                                        </a>
                                                                                        <span>
                                                                                            Dear $name, Thank You for
                                                                                            registering as an agent to Line
                                                                                            Addis. You can start recruiting
                                                                                            today by using these credentials.
                                                                                            <br />
                                                                                            Email:
                                                                                            <strong>
                                                                                                $email
                                                                                            </strong>
                                                                                            <br />
                                                                                            Password:
                                                                                            <strong>
                                                                                                $password
                                                                                            </strong>
                                                                                            <br />
                                                                                            <br />
                                                                                            This Password is Randomly Generated.
                                                                                            You can change it on your Line Addis
                                                                                            Profile Page.
                                                                                        </span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'
                                                                                    vertical-align='middle'>
                                                                                    <table border='0' cellpadding='0'
                                                                                        cellspacing='0' role='presentation'
                                                                                        style='border-collapse:separate;line-height:100%;'>
                                                                                        <tr>
                                                                                            <td align='center' bgcolor='#ff6f6f'
                                                                                                role='presentation'
                                                                                                style='background-color:#54682b;border:none;border-radius:5px;cursor:auto;padding:10px 25px;'
                                                                                                valign='middle'>
                                                                                                <a href='http://lineaddis.com/agents/login'
                                                                                                    style='background:#54682b;color:#ffffff;font-family:Oxygen, Helvetica neue, sans-serif;font-size:14px;font-weight:400;line-height:21px;margin:0;text-decoration:none;text-transform:none;'
                                                                                                    target='_blank'>
                                                                                                    Log In
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--[if mso | IE]>
        </td></tr></table>
        <![endif]-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>";				//An HTML or plain text message body
        if($mail->Send())								//Send an Email. Return true on success or false on error
        {
          $error = "<label>Coudn't Send Your Email</label>";
        }
        else
        {
          $error = "ERROR: ".$mail->ErrorInfo;
        }

        echo $error;
        
      } else{
        $data = [
          'name' => '',
          'phone' => '',
          'list' => [],
          'email_message' => $error
        ];
        $this->view('agents/testing', $data);
        //$data['list'] =  $this->agentModel->getAgentNamesandIds();
      }


      
      
      
    }


    public function dashboard(){
      if(!isLoggedIn()){
        redirect('agents/login');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'name_1' => trim($_POST['name_1']),
          'phone_1' => trim($_POST['phone_1']),
          'student_err' => '',
          'name_2' => trim($_POST['name_2']),
          'phone_2' => trim($_POST['phone_2']),
          'name_3' => trim($_POST['name_3']),
          'phone_3' => trim($_POST['phone_1']),
          'visa_students' => 0,
          'total_money' => 0,
          'promocode' => '',
          'affiliate' => '',
          'students' => []
        ];

        $topdata = $this->agentModel->getVisaStudentsAndTotalMoney($_SESSION['user_id']);
        $data['visa_students'] = $topdata['visa_students'];
        $data['total_money'] = $topdata['total_money'];
         
        $data['promocode'] = $this->agentModel->getAgentPromocode($_SESSION['user_id']);
        $data['affiliate'] = $_SESSION['user_id'];
        $data['students'] = $this->agentModel->getAgentStudents($_SESSION['user_id']);

        // Make sure no errors
        if($pass){
          $length = 1;
          if(!empty($data['name_2'])){
            $length = 2;
          }
          if(!empty($data['name_3'])){
            $length = 3;
          }
          
        
          
          if($this->agentModel->registerSuggested($data, $length)){
            $data['students'] = $this->agentModel->getAgentStudents($_SESSION['user_id']);
            $this->view('agents/dashboard', $data);
          } else {
            die('Registeration is Unsuccessful');
            $data['student_err'] = 'Registeration is Unsuccessful'; 
            $this->view('agents/dashboard', $data);
          }
        } else {
          $this->view('agents/dashboard', $data);
        }

      }
      else{
      $data = [
        'name_1' => '',
        'phone_1' => '',
        'student_err' => '',
        'name_2' => '',
        'phone_2' => '',
        'name_3' => '',
        'phone_3' => '',
        'visa_students' => 0,
        'total_money' => 0,
        'promocode' => '',
        'affiliate' => '',
        'students' => []
      ];
      $topdata = $this->agentModel->getVisaStudentsAndTotalMoney($_SESSION['user_id']);
      $data['visa_students'] = $topdata['visa_students'];
      $data['total_money'] = $topdata['total_money'];
       
      $data['promocode'] = $this->agentModel->getAgentPromocode($_SESSION['user_id']);
      $data['affiliate'] = $_SESSION['user_id'];
      $data['students'] = $this->agentModel->getAgentStudents($_SESSION['user_id']);
      
    $this->view('agents/dashboard', $data);
    }
    }

    public function index(){
      if(!isLoggedIn()){
        redirect('agents/login');
      }
        else{
          redirect('agents/dashboard');
        }
    }

    public function acceptandregister(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass = true;
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'bankaccount' => trim($_POST['bankaccount']),
          'email_err' => '',
          'phone_err' => ''
        ];

        // Validate data
        if(empty($data['name'])){
          $this->view('agents/form', $data);
        }
        if(empty($data['email'])){
          $this->view('agents/form', $data);
        }
        if($this->agentModel->findAgentByEmail($data['email'])){
          $pass = false;
          $data['email_err'] = 'Email is already taken';
        }
        if(empty($data['phone'])){
          $this->view('agents/form', $data);
        }
        
        if($this->agentModel->findAgentByPhone($data['phone'])){
          $pass = false;
          $data['phone_err'] = 'Phone is already taken';
        }
        

        // Make sure no errors
        if($pass){
          if(trim($_POST['bankname']) == "Other Bank"){
            $data['bankname'] = trim($_POST['otherbank']);
          }
          else{
            $data['bankname'] = trim($_POST['bankname']);
          }
          $data['id'] = rand(10000000,99999999);
          $data['phone']= strval($data['phone']);
          $data['promocode'] = strtoupper(substr($data['name'],0,1)).substr($data['phone'],2,2).strtoupper(substr($data['name'],1,1)).substr($data['phone'],4,2).strtoupper(substr($data['name'],2,1).substr($data['phone'],0,2));
          $data['tpassword'] = strval(rand(100, 999)).substr($data['email'],3,2).strval(rand(10000000, 99999999)).strtoupper(substr($data['name'],0,1));
          
          if($this->agentModel->register($data)){
            $this->sendEmail($data['name'], $data['email'], $data['tpassword']);
            $link=[
              'affiliate'=>$data['id'],
              'promocode'=>$data['promocode']
            ];
            $this->view('agents/success_subagent', $link);
          } else {
            die('Registeration is Unsuccessful');
            $this->view('agents/form');
          }
        } else {
          $this->view('agents/form', $data);
        }

      } else {
        $this->view('agents/form');
        
      }
    }

    public function success(){
      $link=[
        'affiliate'=>'asdfasdfasdfasdfasdfasfa',
        'promocode'=>'adfasdfasfasfasfasf'
      ];
      $this->view('agents/success_subagent', $link);
    }
  
    public function login(){
      if(isLoggedIn()){
        redirect('agents/dashboard');
      }
      else{
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
        if($this->agentModel->findAgentByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['password_err'] = 'Email / Password is Incorrect.';
        }

        // Make sure errors are empty
        if(empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->agentModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Email or Password is Incorrect.';

            $this->view('agents/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('agents/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('agents/login', $data);
      }
    }
    }

    private function sendEmail($name, $email, $password){
      require APPROOT .'/libraries/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'mail.lineaddis.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 587;								//Sets the default SMTP server port
        $mail->SMTPAuth = true;		
        $mail->SMTPDebug = 0;
       // $mail->SMTPKeepAlive = true;   
        $mail->Username = 'hello@lineaddis.com';					//Sets SMTP username
        $mail->Password = 'linehelloaddis2021';					//Sets SMTP password
        $mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'hello@lineaddis.com';					//Sets the From email address for the message
        $mail->FromName = 'Line Addis | Agent Support';				//Sets the From name of the message
        $mail->AddAddress($email, 'Client');		//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML				
        $mail->Subject = "Line Addis - Agent Credentials";				//Sets the Subject of the message
        $mail->Body = "<!doctype html><html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'
            xmlns:o='urn:schemas-microsoft-com:office:office'>
          <head>
            <title>
            </title>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <style type='text/css'>
                #outlook a {
                    padding: 0;
                }
        
                .ReadMsgBody {
                    width: 100%;
                }
        
                .ExternalClass {
                    width: 100%;
                }
        
                .ExternalClass * {
                    line-height: 100%;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
            </style>
            <!--[if !mso]><!-->
            <style type='text/css'>
                @media only screen and (max-width:480px) {
                    @-ms-viewport {
                        width: 320px;
                    }
        
                    @viewport {
                        width: 320px;
                    }
                }
            </style>
            <!--<![endif]-->
            <!--[if mso]> 
            <xml> 
              <o:OfficeDocumentSettings> 
                <o:AllowPNG/> 
                <o:PixelsPerInch>96</o:PixelsPerInch> 
              </o:OfficeDocumentSettings> 
            </xml>
            <![endif]-->
            <!--[if lte mso 11]> 
            <style type='text/css'> 
              .outlook-group-fix{width:100% !important;}
            </style>
            <![endif]-->
            <style type='text/css'>
                @media only screen and (max-width:480px) {
        
                    table.full-width-mobile {
                        width: 100% !important;
                    }
        
                    td.full-width-mobile {
                        width: auto !important;
                    }
        
                }
        
                @media only screen and (min-width:480px) {
                    .dys-column-per-90 {
                        width: 90% !important;
                        max-width: 90%;
                    }
                }
            </style>
        </head>
        
        <body>
            <div>
                <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation'
                    style='background:#f7f7f7;background-color:#f7f7f7;width:100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <div style='margin:0px auto;max-width:600px;'>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation'
                                        style='width:100%;'>
                                        <tbody>
                                            <tr>
                                                <td
                                                    style='direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;'>
                                                    <!--[if mso | IE]>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td style='vertical-align:top;width:540px;'>
        <![endif]-->
                                                    <div class='dys-column-per-90 outlook-group-fix'
                                                        style='direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' role='presentation'
                                                            width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style='background-color:#ffffff;border:1px solid #ccc;padding:45px 75px;vertical-align:top;'>
                                                                        <table border='0' cellpadding='0' cellspacing='0'
                                                                            role='presentation' style='' width='100%'>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'>
                                                                                    <table border='0' cellpadding='0'
                                                                                        cellspacing='0' role='presentation'
                                                                                        style='border-collapse:collapse;border-spacing:0px;'>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style='width:130px;'>
                                                                                                    <img alt='LINE ADDIS'
                                                                                                        height='auto'
                                                                                                        src='https://lineaddis.com/assets/images/line-addis-logo-122x54.png'
                                                                                                        style='border:1px solid #ccc;border-radius:5px;display:block;font-size:13px;height:auto;outline:none;text-decoration:none;width:100%;'
                                                                                                        width='130' />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'>
                                                                                    <div
                                                                                        style='color:#777777;font-family:Oxygen, Helvetica neue, sans-serif;font-size:14px;line-height:21px;text-align:center;'>
                                                                                        <a href
                                                                                            style='display:block; color: #ff6f6f; font-weight: bold; text-decoration: none;'>
                                                                                        </a>
                                                                                        <span>
                                                                                            Dear ".$name.", Thank You for
                                                                                            registering as an agent to Line
                                                                                            Addis. You can start recruiting
                                                                                            today by using these credentials.
                                                                                            <br />
                                                                                            Email:
                                                                                            <strong>"
                                                                                              .$email."
                                                                                            </strong>
                                                                                            <br />
                                                                                            Password:
                                                                                            <strong>
                                                                                             ".$password."
                                                                                            </strong>
                                                                                            <br />
                                                                                            <br />
                                                                                            This Password is Randomly Generated.
                                                                                            You can change it on your Line Addis
                                                                                            Profile Page.
                                                                                        </span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align='center'
                                                                                    style='font-size:0px;padding:10px 25px;word-break:break-word;'
                                                                                    vertical-align='middle'>
                                                                                    <table border='0' cellpadding='0'
                                                                                        cellspacing='0' role='presentation'
                                                                                        style='border-collapse:separate;line-height:100%;'>
                                                                                        <tr>
                                                                                            <td align='center' bgcolor='#ff6f6f'
                                                                                                role='presentation'
                                                                                                style='background-color:#54682b;border:none;border-radius:5px;cursor:auto;padding:10px 25px;'
                                                                                                valign='middle'>
                                                                                                <a href='http://lineaddis.com/agents/login'
                                                                                                    style='background:#54682b;color:#ffffff;font-family:Oxygen, Helvetica neue, sans-serif;font-size:14px;font-weight:400;line-height:21px;margin:0;text-decoration:none;text-transform:none;'
                                                                                                    target='_blank'>
                                                                                                    Log In
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--[if mso | IE]>
        </td></tr></table>
        <![endif]-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>";				//An HTML or plain text message body
        if($mail->Send())								//Send an Email. Return true on success or false on error
        {
          $error = "Sent";
        }
        else
        {
          $error = "ERROR: ".$mail->ErrorInfo;
        }
        return $error;
    }

    public function delete_students($id){
      if(!empty($id)){
        $this->studentModel->deletePotentialStudent($id);
      }
      redirect('agents/dashboard');
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_type'] = 1;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;

      redirect('agents/dashboard');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_type']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('agents/login');
    }
  }