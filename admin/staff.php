<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
 //get teachers for drop down
   $ssql = "select username from users where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND who = 'teacher' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $teachers[] = $srow['username'];
       
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
        <form  action="" method="POST">
<table>
     
<tr><td><label>User ID</label></td></tr>
<tr><td>
        <select name='teacher' value='' class="select min" required=""> 
<option selected value='<?php echo @$_POST['teacher']; ?>'><?php echo @$_POST['teacher']; ?>
<?php // dynamic drop-down list
foreach ($teachers as $teacher) {
    echo "<option>$teacher</option>\n";
} ?>
</select>
    </td></tr>

<tr><td><button type="submit" name="submit" />Get Details</button></td></tr>

</table>


</form>    
     <?php include('includes/getstaff.inc.php');?>            
    </div>
    
                      <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    </div>

</div>   
	
</body>
</html>
