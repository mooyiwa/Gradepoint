<?php 
// reset pass
if(isset($_POST['submit'])){
    $newpass = $_POST['newpass'];
    $tid = $_SESSION['logname'];
     
  $sql = "update users set password = md5('$newpass') where username = '$tid' ";
  $result = mysqli_query($cnx,$sql);
     $msg = 'PASSWORD CHANGED!';
		 
}
     
     
    
 			
  
?>



  

