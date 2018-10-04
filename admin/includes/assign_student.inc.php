<?php 
if(isset($_POST['submit']))
  {
     $class = $_POST['class'];
     $stud = $_POST['stud'];
     $year = $_POST['year'];
       
   // get class teacher
     $tesql = "select classteacher from classes where class = '$class' and year = '$year'";
     $teresult = mysqli_query($cnx, $tesql);
     $terow = mysqli_fetch_array($teresult);
     $classteacher = $terow['classteacher'];
     
//q1

 $sql = "update students set level = '".$class."',
                               teacherID = '".$classteacher."'
                         where username = '".$stud."' 
                           and year = '".$year."'
                          and  school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

 //q2
  $sql2 = "update results set class = '".$class."',
                                teacherID = '".$classteacher."'
                          where studentID = '".$stud."'           
                          and   year = '".$year."'
                           and  school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result2 = mysqli_query($cnx,$sql2);
 
 
 
     if($result && $result2){
     $msg = 'Student Reassigned!';
     
  }

 
 

  }
  

