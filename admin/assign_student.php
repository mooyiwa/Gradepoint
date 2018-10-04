<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/assign_student.inc.php'); 
 //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   }
   //get studs for drop down
   $ssql = "select distinct username from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by level";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $studs[] = $srow['username'];
       
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
       
       <tr><td><label>Student ID</label></td></tr>
    <tr>  <td>
            <select name='stud' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['stud']; ?>'><?php echo @$_POST['stud']; ?>
<?php // dynamic drop-down list     
foreach ($studs as $stud) {
    echo "<option>$stud</option>\n";
} ?>
</select>
      </td>
      
       </tr>
       

</table><table>
    
<?php
 
    //get classes for drop down
   $ccsql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
   $ccresult =  mysqli_query($cnx,$ccsql);
   while($ccrow = mysqli_fetch_array($ccresult)){
          $classes[] = $ccrow['class'];
       
   }
      ?>

<tr><td>New Class</td></tr>


<tr><td>
   <select name='class' value='' class="select" required="">

 <option selected value='<?php echo $_POST['class']; ?>'><?php echo $_POST['class']; ?>
    <?php // dynamic drop-down list
foreach ($classes as $class) { ?>
    <option><?php echo $class ?></option>
<?php } ?>
</select>
    </td>
    </tr>

 
   <tr><td><button type='submit' name='submit'>Re-Assign Student</button></td></tr>
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
