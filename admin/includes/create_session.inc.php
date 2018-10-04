<?php 

if(isset($_POST['submit']))
  {
     $session = $_POST['session'];
     
 $sql = "insert into sessions set session = '".$session."',
                                    status = 'Open',
                                    school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

                if($result){
     $msg = 'Session Created!';
     
   }

 }
  
  

