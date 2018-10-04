<?php 

if(isset($_POST['submit']))
  {
    //$class = $_POST['class'];
     $teacher = $_POST['teacher'];
     $year = $_POST['year'];
       
   //get class of teacher
     $q = "select class from classes where classteacher = '".$teacher."'";
     $r = mysqli_query($cnx,$q);
     $rr = mysqli_fetch_array($r);
     $class = $rr['class'];

 $sql = "update results set class = '".$class."'
                               
                        where teacherID = '".$teacher."'
                        and year = '".$_POST['year']."'    
                         and  school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

 
     if($result){
     $msg = 'Class Pinned!';
     
  }

 }
 

  
  

