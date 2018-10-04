<?php 
// 
if(isset($_POST['submit']))
  {
     $user = $_POST['user'];
     $full = $_POST['full'];
     $who = $_POST['who'];

     $sex = $_POST['sex'];

     $email = $_POST['email'];
     $phone = $_POST['phone'];
     //$address = $_POST['address'];

     

 $sql = "insert into users set username = '".$user."',
                                password = md5('password'),
                                fullname = '".$full."',
                                who = '".$who."',
                                tsex = '".$sex."',
                                temail = '".$email."',
                                tphone = '".$phone."',
                                school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'    
                                ";
 $result = mysqli_query($cnx,$sql);

              if($result){
     $msg = 'User Created!';
     
 }
              elseif(!$result){
     $msg = mysqli_error($cnx);
     
 }


  }
  

