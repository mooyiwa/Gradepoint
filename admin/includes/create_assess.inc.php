<?php 

if(isset($_POST['submit']))
  {
     $assess = $_POST['assess'];
       
     
  $limit = count($assess);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into assessment set cate = '".$assess[$i]."',
                                   school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

                if($result){
     $msg = 'Assessment Category(ies) Created!';
     
 }

 }
  }
  

