<?php 
// change psw
if(isset($_POST['submit'])) {
     $psw = $_POST['psw'];
    

     
     $sql = "update elib_users set password1 = md5('$psw'),
                                password2 = md5('$psw')
                                 where username = '".$_SESSION['logname']."' ";
				                      
     $result = mysqli_query($cnx,$sql);
     $msg = 'Password Changed!';
		 
}
     
      
?>


