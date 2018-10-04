<?php      
       
// connect to server
      include('includes/session.inc.php');
      $cnx = mysqli_connect ($host,$user,$password);
      if(!$cnx)
      { echo "server connection failed ", mysqli_error($cnx);}


      //select db
      $dbconn = mysqli_select_db($cnx,$db);
        if(!$dbconn)
        {
        echo "database connex failed ",mysqli_error($cnx);
        }