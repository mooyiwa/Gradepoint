<?php 
// Clr
if(isset($_POST['submit']))
  {
     
     $year = $_POST['year'];
     
   

 $sql = "delete from users where who = 'student' and session = '$year'
                                       and
                                 school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'
                                ";
 $result = mysqli_query($cnx,$sql);

  if($result){
      $msg = 'PINs Cleared!';
  }

 
  }
  

