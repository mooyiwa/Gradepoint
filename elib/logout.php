<?php
session_start();
ob_start();
// connect to server
      include('../includes/session.inc.php');
      $cnx = mysqli_connect ($host,$user,$password);
      if(!$cnx)
      { echo "server connection failed ", mysqli_error($cnx);}


      //select db
      $dbconn = mysqli_select_db($db);
        if(!$dbconn)
        {
        echo "database connex failed ",mysqli_error($cnx);
        }
        
     
 //logout       
if(isset($_GET['logout']))
{
    //$sql = "update elib_users set status = 0 where username = '".$_SESSION['logname']."' ";
   // mysqli_query($cnx,$sql); 
session_destroy();

}

header('Location: ./index.php');



?>
