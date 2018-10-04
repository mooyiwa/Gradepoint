<?php

  if(isset($_POST['submit'])){ 
      $stud = $_POST['stud'];
      $new_id = $_POST['new_id'];
//3 Qs
  $q1 = "update students set username = '".$new_id."' where username = '".$stud."' and school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";    
  $result1 = mysqli_query($cnx,$q1);
  
  $q2 = "update users set username = '".$new_id."' where username = '".$stud."' and who = 'student' and school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";    
  $result2 = mysqli_query($cnx,$q2);
  
  $q3 = "update results set studentID = '".$new_id."' where studentID = '".$stud."' and school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";    
  $result3 = mysqli_query($cnx,$q3);
  
  if($result1 || $result2 || $result3){
      $msg = "ID Changed!";
  }
 }
   

    
     