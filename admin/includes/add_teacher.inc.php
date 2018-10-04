<?php 

if(isset($_POST['submit']))
  {
     $class = $_POST['class'];
     $teacher = $_POST['teacher'];
     $year = $_POST['year'];
       
     
  $limit = count($class);

for($i=0;$i<$limit;$i++) {

 $sql = "update classes set classteacher = '".$teacher[$i]."',
                               year = '".$_POST['year']."'
                        where class = '".$class[$i]."'
                         and  school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

     if($result){
     $msg = 'Teacher(s) Added!';
     
  }

 }
 

  }
  

