<?php
  class Courses extends Controller {
    public function __construct(){
        $this->courseCatalogModel = $this->model('CourseCatalog');
    }

    public function index(){
        redirect('courses/courseCatalogs');
      }

    public function courseCatalogs(){
      $data = [
        'program' => '',
        'level' => '',
        'lang' => '',
        'country' => '',
        'sort' => '',
        'areas' => $this->courseCatalogModel->courseAreas(),
        'courses' => $this->courseCatalogModel->allCourseCatalogs()
      ];
      
      $this->view('courses/course_catalogs', $data );
    }

      public function filtercourseCatalogs(){

      //  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //   // Sanitize POST array

      //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //  $data =[
      //     'program' => trim($_POST['program']),
      //     'level' => trim($_POST['level']),
      //     'lang' => trim($_POST['lang']),
      //     'country' => trim($_POST['country']),
      //     'sort' => trim($_POST['sort']),
      //     'areas' => $this->courseCatalogModel->courseAreas(),
      //     'courses' => []
      //   ];
      //   $areas = [];
      //   foreach ($data['areas'] as $caa) {
      //     if(array_key_exists($caa, $_POST)){
      //       $data[$caa] = trim($_POST[$caa]);
      //       array_push($areas, $caa);
      //     }
      //   }
      //   $data['courses'] = $this->courseCatalogModel->filterCourses($this->courseCatalogModel->coursesFromArea($areas), $data);
      //  $this->view('courses/course_catalogs', $data );
      
      // } else{
      //   redirect('courses/courseCatalogs');
      // }
          
        
      }


      



      
}

?>