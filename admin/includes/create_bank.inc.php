<?php 
if(isset($_POST['submit']))
  {
     $bank = mysqli_real_escape_string($cnx,$_POST['bank']);
    
       
 $sql = "insert into banks set bank = '$bank'";
 $result = mysqli_query($cnx,$sql);

if($result){
     $msg = 'Bank Created!';
       }
   
 }
  

