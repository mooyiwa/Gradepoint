<?php 
// Register stud
if(isset($_POST['submit']))
  {
     $user = $_POST['user'];
     $full = $_POST['full'];
     $class = $_POST['class'];

     $sex = $_POST['sex'];

     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];

     //Get teacher ID from class
     
     $gsql ="select classteacher from classes where class = '$class' ";
     $gresult = mysqli_query($cnx,$gsql);
     $grow = mysqli_fetch_array($gresult);
     $teacher = $grow['classteacher'];
      
         
     
  $limit = count($user);

for($i=0;$i<$limit;$i++) {

 $sql = "insert into students set username = '".$user[$i]."',
                                password = md5('password'),
                                fullname = '".$full[$i]."',
                                level = '".$class."',
                                sex = '".$sex[$i]."',
                                address = '".$address[$i]."',
                                email = '".$email[$i]."',
                                phone = '".$phone[$i]."',
                                teacherID = '".$teacher."'
                                ";
 $result = mysqli_query($cnx,$sql);

            if($result){
     $msg = 'Registration Successful!';
     
 }

 }
  }
  

