<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       include('includes/staff_reg.inc.php'); 
 //get role/ capacity for drop down
   $ssql = "select who from who order by who";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $whos[] = $srow['who'];
       
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
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";}
elseif(isset($_POST['submit']) && !$result) {echo "<p class='msg'>",$msg,"</p>","\n";}?>         
<form  action="" method="POST">
<table>
  
<tr><td><label>Create User As:</label></td></tr>
<tr><td>
        <select name='who' value='' class="select" required="">
<?php // dynamic drop-down list 
echo"<option selected value=''>",$_POST['who'];
foreach ($whos as $who) {
    echo "<option>$who</option>\n";
} ?>
</select>
    </td></tr>



<tr><td>Username</td><td>Fullname</td><td>Sex</td><td>Email</td><td>Phone</td></tr>

<tr><td><input type='text' name='user' required="" /></td><td><input type='text' name='full' size='35' required="" /></td><td>
        <select name='sex' value='' class="select" required="">

<option selected value=''> --

<option>M</option>
<option>F</option>

</select>      
</td>
<td><input type='text' name='email' required="" /></td><td><input type='text' name='phone' required="" /></td>
</tr>
<tr><td><button type='submit' name='submit'>Create User</button></td></tr>
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
