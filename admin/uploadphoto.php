<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       //include('includes/studs_reg.inc.php'); 
       
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
    
    <div class="grid_2 dash"><?php include('includes/dash.inc.php'); ?></div>
    <div class="grid_10 workarea">
 

    </div>
</div>   
	
</body>
</html>
