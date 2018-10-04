<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       include('includes/studs_reg.inc.php'); 
 //get classes for drop down
   $ssql = "select class from classes order by class";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $classes[] = $srow['class'];
       
   }        
?>
<!DOCTYPE html>
<html>
<head>    
<title></title>

<link rel="stylesheet" type="text/css" href="../css/1200.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
 
 
</head>
<body class="admin">
  
<div class="container">
     <div class="grid_2 logo"><img src="../img/logo.png" /></div>
     <div class="grid_10 workarea alpha">

<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>
<form  action="" method="POST">
<table>
 
<tr><td><label>No of Fields</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" /></td><td><input type="submit" name="go" value="Go"/></td></tr>

</table><table>
<?php

  if(isset($_POST['go'])){ ?>
  <tr><td><label>Class</label></td></tr>

<tr><td>
        <select name='class' value='' class="select" required="">

<option selected value=''> <?php echo $_POST['class']; ?>
<?php // dynamic drop-down list     
foreach ($classes as $class) {
    echo "<option>$class</option>\n";
} ?>
</select>
    </td></tr>    
 
    <?php
echo"<tr>","<td>Username</td>","<td>Fullname</td>","<td>Sex</td>","<td>Email</td>","<td>Phone</td>","<td>Address</td>","</tr>";
for($i=1; $i<=@$_POST['fields']; $i++){ ?>

    <tr><td><input type='text' name='user[]' required="" /></td>
        <td><input type='text' name='full[]' size='35' required="" /></td>
        <td><select name='sex[]' value='' class='select' required="">

<option selected value=''> --

<option>M</option>
<option>F</option>

</select>      
        </td><td><input type='text' name='email[]' required="" /></td>
        <td><input type='text' name='phone[]' required="" /></td>
        <td><input type='text' name='address[]' required="" /></td></tr>
 
<?php  } ?>
<tr><td><button type='submit' name='submit'>Register</button></td></tr>
<?php } 
 ?>

</table>
</form>
    </div>
          <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
</div>   
	
</body>
</html>
