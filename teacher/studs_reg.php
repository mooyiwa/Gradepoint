<?php
session_start();
include('../cnx.php');
include('../includes/header.php'); 
//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       include('includes/studs_reg.inc.php'); 
//get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   }        
     
?>

<body class="admin">
  
<div class="container">
     <div class="row">
     <div class="span2"><img src="../img/logo.png" /></div>
     <div class="span10"> </div>
    
     </div>
 
   <div class="row">
    
    <div class="span10 alpha workarea">
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} 
elseif(isset($_POST['submit']) && !$result) {echo $err;} ?>         
<form  action="" method="POST">
    <table>
<tr><td><label>No of Students to register</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" /></td><td><input type="submit" name="go" value="Go"/></td></tr>

<?php

if(isset($_POST['go'])){ ?>

<tr><td><label>School Year</label></td></tr>
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
      
<tr><td>Username</td><td>Fullname</td><td>Sex</td></tr>
<?php 
for($i=1; $i<=@$_POST['fields']; $i++){ ?>

  <tr><td><input type='text' name='user[]' size='' /></td><td><input type='text' name='full[]' size='38' /></td>
  <td>
<select name='sex[]' value=''>

<option selected value=''> --

<option>M</option>
<option>F</option>

</select>      
</td>

</tr>

 <?php  } ?>
<tr><td><button type="submit" name="submit">Register</button>
         </td></tr>
<?php }
?>

</table>
</form>
    </div>
    
     <div class="span2 dash"><?php include('includes/dash.inc.php'); ?></div>
</div>   
	
</body>
</html>
