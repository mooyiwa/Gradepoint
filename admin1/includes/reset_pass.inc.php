<?php 

if(isset($_POST['submit'])) {
     $psw = $_POST['psw'];
     $usr = $_POST['usr'];

     
     $sql = "update users set password = md5('$psw')
                               
                                 where username = '".$usr."' ";
				                      
     $result = mysqli_query($cnx,$sql);
     $msg = 'PASSWORD CHANGED!';
		 
}
     
    
    
 			
  
?>


