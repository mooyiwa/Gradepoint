<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
       
       if(isset($_POST['submit'])){

       $user = $_POST['user'];
       $pass = $_POST['pass'];
       $first = $_POST['first'];
       $last = $_POST['last'];
       $addy = $_POST['addy'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       
       
       $sql = "insert into users set username = '$user',
                                       who = 'student', 
                                       password1 = md5('$pass'),
                                       password2 = md5('$pass'),
                                       firstname = '$first',
                                       lastname = '$last',
                                       address = '$addy',
                                       phone = '$phone',
                                       email = '$email'";
       $result = mysqli_query($cnx,$sql);
       
       if($result){ $msg = 'Account Creation Successful!'; }
       
     }
       
?>
<!DOCTYPE html>
<html>
<head>    
<title></title>

<link rel="stylesheet" type="text/css" href="../css/1200.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 
 
</head>
<body class="admin">
  
<div class="container">
    <div class="grid_10"></div>
    <div class="grid_2 logo"></div>
    
    <div class="grid_4"><span class="logname usracct"><?php echo $_SESSION['logname']; ?> | <a href='../logout.php?logout=1'>Log out</a></span></div>
    <div class="grid_8 blank"></div>
    
    <div class="grid_4 dash"><?php include('includes/dash.inc.php'); ?></div>
    <div class="grid_6 workarea">
             <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form">

              <ul class="indent">
                  <?php
                   if($msg){ ?>
                  <p><span style="border: 1px solid #99c;padding: 9px;"><?php echo $msg ?></span></p>
                   <?php } ?>
                  <p>Username</p>
                  <li><input type="text" name="user" style="height: 24px;width: 205px;" /></li>
                  
                  <p>Password</p>
                  <li><input type='text' name="pass" style="height: 24px;width: 205px;" /></li>
                  
                  <p>First Name</p>
                  <li><input type="text" name="first" style="height: 24px;width: 205px;" /></li>
                  
                  <p>Last Name</p>
                  <li><input type='text' name="last" style="height: 24px;width: 205px;" /></li>
                  
                  <p>Address</p>
                  <li><textarea name="addy" id="addy" rows="7" cols="45"></textarea></li>
                  
                  <p>Phone</p>
                  <li><input type='text' name="phone" style="height: 24px;width: 205px;" /></li>
                  
                  <p>e-Mail</p>
                  <li><input type='text' name="email" style="height: 24px;width: 205px;" /></li>
                  
                   <p></p>       
                  <li><input type="submit" name="submit"  value="Post Work" class="find" /></li>
              </ul>
          </form>
                 
    </div>
    
    <div class="grid_2 blank"></div>
</div>   
	
</body>
</html>
