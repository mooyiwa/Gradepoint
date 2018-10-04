<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
   include('../includes/hijack_sess.inc.php'); 
   

       
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
   <div class="grid_6 alpha"></div>
   <div class="grid_4"></div>
   <div class="grid_2 logo">  
   </div>
    
   <div class="grid_2"><?php include('includes/dash.inc.php'); ?></div>
   <div class="grid_7 workarea">
<?php include('includes/getsubjects.inc.php');?> 
                 
    </div>
    
   
</div>   
	
</body>
</html>
