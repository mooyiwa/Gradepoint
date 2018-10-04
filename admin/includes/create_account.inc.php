<?php 
if(isset($_POST['submit']))
  {
     $user = $_POST['user'];
     $email = $_POST['email'];     
     $name = mysqli_real_escape_string($cnx,$_POST['name']);
     $address = mysqli_real_escape_string($cnx,$_POST['address']);
     $psw = md5('password');
       
 //create school    
 $sql = "insert into school set name = '$name',
                                  address = '$address',
                                  username = '$user' ";
 $result = mysqli_query($cnx,$sql);
 
 
 //create login and send mail
   $csql = "insert into users set 
                                    username = '$user',
                                    password = '$psw',
                                    temail = '$email',
                                    school = '".mysqli_real_escape_string($cnx,$name)."',
                                    who = 'admin' ";
   $cresult = mysqli_query($cnx,$csql);
   
 // send mail
	$to = $email;
	$subject = "Admin Account creation details";
        $from = "school@gradepoint.com.ng";
	
	
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
$message = "<html><body>";
$message .= "<h2>School Admin Account Creation Details</h2>";
$message .= "<table rules='all' cellpadding='8'>";

$message .= "<tr><td><b>Username:</b></td><td>" . $user . "</td></tr>";
$message .= "<tr><td><b>Password:</b></td><td>" .$psw ."</td></tr>";

$message .= "<tr><td>See the link provided below to access your account:</td></tr>";
$message .= "<tr><td>https://gradepoint.com.ng</td></tr>";

$message .= "</table>";
$message .= "</body></html>";

	
	$ok = @mail( $to, $subject, $message, $headers );    


if($result && $cresult){
     $msg = "Account Created! You've got mail.";
       }
   
 }
  

