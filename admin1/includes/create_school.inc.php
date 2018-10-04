<?php 

if(isset($_POST['submit']))
  {
     $name = mysqli_real_escape_string($cnx,$_POST['name']);
     $address = mysqli_real_escape_string($cnx,$_POST['address']);
       
     
 $sql = "insert into school set name = '$name',
                                  address = '$address',
                                  username = '".$_SESSION['logname']."' ";
 $result = mysqli_query($cnx,$sql);

if($result){
     $msg = 'School Created!';
       }
   
 }
  

