<?php
  class CourseCatalog {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add Course 
    public function addCourseCatalog($data){
        $this->db->query('INSERT INTO course_catalog (title, city, country, language, duration, level, fee) VALUES(:title, :city, :country, :language, :duration, :level, :fee)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':language', $data['language']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':fee', $data['fee']);
        if($this->db->execute()){
          return true;
          } 
        else {
          return false;
        }
    }

    // All Course
    public function allCourseCatalogs(){
        $this->db->query('SELECT * FROM course_catalog ORDER BY updated_at DESC');
        $row = $this->db->resultSet();
        return $row;
    }

    //Filter the Courses
    public function filterCourses($courseIdsbyarea, $data){
      $selectStatement = 'SELECT * FROM course_catalog';
      if(!empty($data['program'])){
        if($data['program'] != ''){
          $selectStatement .= " WHERE title LIKE '%".$data['program']."%'";   
        }
      }
      
      if(!empty($data['level'])){
        if($data['level'] != 'Non-Specified'){
          if (strpos($selectStatement, 'WHERE') !== false){
                $selectStatement .= ' AND level = '.$data['level'];
              }
              else{
                $selectStatement .= ' WHERE level = '.$data['level'];        
              }
           
        }
      }

      if(!empty($data['lang'])){
        if($data['lang'] != 'Non-Specified'){
           if (strpos($selectStatement, 'WHERE') !== false){
                $selectStatement .= " AND language = "."'".$data['lang'].".";
              }
              else{
                $selectStatement .= ' WHERE language = '."'".$data['lang']."'";        
              }
           
        }
      }

      if(!empty($data['country'])){
        if($data['country'] != 'Non-Specified'){
           if (strpos($selectStatement, 'WHERE') !== false){
                $selectStatement .= ' AND country = '."'".$data['country']."'";
              }
              else{
                $selectStatement .= ' WHERE country = '."'".$data['country']."'";        
              }
           
        }
      }

      if(!empty($data['sort'])){
        if($data['sort'] != 'Non-Specified'){
          $selectStatement .= ' ORDER BY '.$data['sort']; 
        }
        else{
          $selectStatement .= ' ORDER BY updated_at DESC';
        }
      }
      else{
        $selectStatement .= ' ORDER BY updated_at DESC';
      }
      
      $this->db->query($selectStatement);
      $row = $this->db->resultSet();
      $finalFilteredCourses = [];
      if(count($courseIdsbyarea) > 0){
        foreach ($row as $filteredcourse) {
          if(in_array($filteredcourse->id, $courseIdsbyarea)){
            array_push($finalFilteredCourses, $filteredcourse);
          } 
        }
      }else{
        $finalFilteredCourses = $row;
      }
    return $finalFilteredCourses;
  }

  // All Course Areas
  public function courseAreas(){
    $this->db->query('SELECT name FROM course_catalog_areas');
    $courseCatAreas = [];
    $row = $this->db->resultSet();
    foreach ($row as $cca) {
       array_push($courseCatAreas, $cca->name);
    } 
    return $courseCatAreas;
  }

    // Courses per Area
    public function coursesFromArea($data){
      $courses = [];
      foreach($data as $area){
        $this->db->query('SELECT course_id FROM catalog_and_areas WHERE area = :area ORDER BY updated_at DESC');
        // Bind value
        $this->db->bind(':area', $area);
        $row = $this->db->resultSet();
        if(count($row) > 0){
          foreach ($row as $cse) {
            if(!in_array($cse->course_id, $courses)){
              array_push($courses, $cse->course_id);
            }
          }
        } 
      }
      //$courses = array_unique($courses);
      return $courses;
    }

  public function getCourseById($id){
    $this->db->query('SELECT * FROM course_catalog WHERE id = :id');
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
  }

?>