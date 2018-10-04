<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/pin_classes.inc.php'); 
 //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   }
        //get teacherIDs for drop down
   $ssql = "select username from users where who = 'teacher' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $users[] = $srow['username'];
       
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
    <tr><td><label>Active Session</label></td></tr>
    <tr>  <td>
            <select name='year' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['year']; ?>'><?php echo @$_POST['year']; ?>
<?php // dynamic drop-down list     
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
      </td> 
       </tr>
</table><table>

<tr><td>Teacher</td></tr>

<tr>
    <td>
            <select name='teacher' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['teacher']; ?>'><?php echo @$_POST['teacher']; ?>
<?php // dynamic drop-down list     
foreach ($users as $user) {
    echo "<option>$user</option>\n";
} ?>
</select>
     </td>
    </tr>
   <tr><td><button type='submit' name='submit'>Pin Class of Teacher to results</button></td></tr>

</table>
</form>
    </div>
                   <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
</div>   
	
</body>
</html>
