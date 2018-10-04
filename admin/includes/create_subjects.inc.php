<?php 

if(isset($_POST['submit']))
  {
     $subject = $_POST['subject'];
       
     
  $limit = count($subject);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into subjects set subject = '".$subject[$i]."',
                                    school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

                 if($result){
     $msg = 'Subject(s) Created!';
     
   }

  }
 }
  

