<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/replace_teacher.inc.php'); 
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
    //get classes for drop down
   $ccsql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
   $ccresult =  mysqli_query($cnx,$ccsql);
   while($ccrow = mysqli_fetch_array($ccresult)){
          $classes[] = $ccrow['class'];
       
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
         
<?php if(isset($_POST['submit']) && $qresult && $qresult2 && $qresult3) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>           
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

<tr><td>Class</td><td>Teacher</td></tr>

<tr><td>
            <select name='class' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['class']; ?>'><?php echo @$_POST['class']; ?>
<?php // dynamic drop-down list     
foreach ($classes as $class) {
    echo "<option>$class</option>\n";
} ?>
</select>
    </td>
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
   <tr><td><button type='submit' name='submit'>Re-Assign Teacher</button></td></tr>

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
