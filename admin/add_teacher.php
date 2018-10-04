<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/add_teacher.inc.php'); 
 //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
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
<tr><td><label>Enter no of Classes to assign e.g 1</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" /></td>
    <td><input type="submit" name="go" value="Go" /></td></tr>
</table><table>
    
<?php

  if(isset($_POST['go'])){
       //get teacherIDs for drop down
   $ssql = "select username from users where who = 'teacher' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $users[] = $srow['username'];
       
   }  
    //get classes for drop down
   $ccsql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
   $ccresult =  mysqli_query($cnx,$ccsql);
   while($ccrow = mysqli_fetch_array($ccresult)){
          $classes[] = $ccrow['class'];
       
   }
      ?>

<tr><td>Class</td><td>Teacher</td></tr>
<?php
for($i=1; $i<=@$_POST['fields']; $i++){ 
    
    ?>

<tr><td>
   <select name='class[]' value='' class="select" required="">

 <option selected value='<?php echo $_POST['class']; ?>'><?php echo $_POST['class']; ?>
    <?php // dynamic drop-down list
foreach ($classes as $class) { ?>
    <option><?php echo $class ?></option>
<?php } ?>
</select>
    </td>
    <td>
<select name='teacher[]' value='' class="select" required="">

 <option selected value='<?php echo $_POST['teacher']; ?>'><?php echo $_POST['teacher']; ?>
    <?php // dynamic drop-down list
foreach ($users as $user) {
    echo "<option>$user</option>\n";
} ?>
</select>
     </td></
    </tr>

  <?php } ?>
   <tr><td><button type='submit' name='submit'>Assign Teacher(s)</button></td></tr>
<?php }
?>

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
