<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       include('includes/reset_pass.inc.php'); 
 //get teacherIDs for drop down
   $ssql = "select username from users where who != 'student' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $users[] = $srow['username'];
       
   }       
?>
<?php include('../includes/header.php'); ?>
<body class="admin">
  
<div class="container">
     <div class="row">
     <div class="span2"><img src="../img/logo.png" /></div>
     <div class="span10"> </div>
     </div>
    
    <div class="row"> 
    <div class="span10 alpha workarea">
         
<?php if(isset($_POST['submit']) && $reset) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>        
<form action="" method="POST">
<table>
    
<tr><td><label>User ID</label></td></tr>
<tr><td>
        <select name='tid' value='' class="select" required="">
<?php // dynamic drop-down list
echo"<option selected value=''>",$_POST['tid'];
foreach ($users as $user) {
    echo "<option>$user</option>\n";
} ?>
</select>
    </td></tr>
<tr><td><label>New Password</label></td></tr>
<tr><td><input type="password" name="newpass" class="ent" required="" /></td></tr>
<tr><td><button name="submit" type="submit">Reset</button></td></tr>
</table> 
</form>
    </div>
     
           <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
        </div>
</div>   
	
</body>
</html>
