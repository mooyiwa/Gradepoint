<?php 
// Register stud
if(isset($_POST['submit']))
  {
     $user = $_POST['user'];
     $full = $_POST['full'];

     $sex = $_POST['sex'];
     $year = $_POST['year'];

     //$email = $_POST['email'];
    // $phone = $_POST['phone'];
     //$address = $_POST['address'];
      
  //get class for class teacher
$csql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND classteacher = '".$_SESSION['logname']."'";
$cresult = mysqli_query($cnx,$csql);
$crow = mysqli_fetch_array($cresult);
$class = $crow['class'];  

     
  $limit = count($user);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into students set username = '".mysqli_real_escape_string($cnx,$user[$i])."',
                              
                                fullname = '".mysqli_real_escape_string($cnx,$full[$i])."',
                                level = '$class',
                                sex = '$sex[$i]',
                                school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."', 
                                year = '".$year."',    
                                teacherID = '".$_SESSION['logname']."'
                                ";
 $result = mysqli_query($cnx,$sql);

  if($result){
      $msg = 'Student(s) Registered!';
  }else {
   //$err = mysqli_error($cnx);
    $err = 'User_ID '.mysqli_real_escape_string($cnx,$user[$i]).' already exists. Pls create new username for pupil';
   }

 }
  }
  

