<?php
  class Pages extends Controller {
    public function __construct(){
    }
    
    public function index(){
      $this->view('pages/index');
    }

    public function aboutus(){
      $this->view('pages/aboutus');
    }

    public function ourservices($section = ''){
     
      if($section == ''){
        $this->view('pages/ourservices', );
      }
     else{
      $this->view('pages/ourservices/'.$section);
     }
    }

    public function posts($section = ''){
     
      if($section == ''){
        $this->view('pages/posts');
      }
     else{
      $this->view('pages/posts/'.$section);
     }
    }

    public function testimonials($section = ''){
     
      if($section == ''){
        $this->view('pages/testimonials');
      }
     else{
      $this->view('pages/testimonials/'.$section);
     }
    }

    


  }