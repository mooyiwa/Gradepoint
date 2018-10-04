<?php

  if(isset($_POST['submit'])){

    $session = $_POST['session'];
   
//the closure 
$c = "update sessions set status ='Closed' where session = '".$session."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' ";
$result = mysqli_query($cnx,$c);

$r = "update students set status = 'Closed' where year = '".$session."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
$result2 = mysqli_query($cnx,$r);

if($result &&  $result2){
    $msg = "School Year Closed!";
}

  }
 
     