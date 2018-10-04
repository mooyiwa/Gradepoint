<?php 

if(isset($_POST['submit']))
  {
     $class = $_POST['class'];
       
     
  $limit = count($class);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into classes set class = '".$class[$i]."',
                                   school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

                if($result){
     $msg = 'Class(es) Created!';
     
 }

 }
  }
  

