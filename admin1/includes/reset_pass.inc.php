<?php 

if(isset($_POST['submit'])) {
     $psw = $_POST['newpass'];
     $usr = $_POST['tid'];

     
     $resql = "update `users` set `password` = md5('$psw')
                               
                                 where `username` = '".$usr."' ";
				                      
     $reset = mysqli_query($cnx,$resql);
     if($reset){
     $msg = 'PASSWORD CHANGED!';
     }		 
}
     
   
 			
  
?>


