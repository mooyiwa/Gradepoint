<?php 

if(isset($_POST['submit']))
  {
     $item = $_POST['item'];
     $cate = $_POST['cate'];
       
     
  $limit = count($item);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into assessment_items set cate = '".$cate."',item = '".$item[$i]."',
                                   school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
 $result = mysqli_query($cnx,$sql);

                if($result){
     $msg = 'Assessment Areas Created!';
     
 }

 }
  }
  

