<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php');  
       
       include('includes/promote.inc.php');
       
//get classes for drop down
   $ssql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $classes[] = $srow['class'];
       
   }      
 //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   }
    //get teacherIDs for drop down
   $qql = "select username from users where who = 'teacher' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by username";
   $qresult =  mysqli_query($cnx,$qql);
   while($qrow = mysqli_fetch_array($qresult)){
          $teachers[] = $qrow['username'];
       
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
<?php if(isset($_POST['submit'])) {echo "<p class='msg'>",@$msg,"</p>","\n";} ?>           
<form  action="" method="POST">
<table>
     
<tr><td><label>Previous Session</label></td><td><label>New Session</label></td></tr>
    <tr>  <td>
            <select name='prev_year' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['prev_year']; ?>'><?php echo @$_POST['prev_year']; ?>
<?php // dynamic drop-down list     
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
      </td>
      
      <td>
            <select name='new_year' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['new_year']; ?>'><?php echo @$_POST['new_year']; ?>
<?php // dynamic drop-down list     
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
      </td>
      
       </tr>
<tr><td><label>Previous Class</label></td><td><label>New Class</label></td><td><label>New Class Teacher</label></td></tr> 
    <tr>  <td>
            <select name='prev_class' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['prev_class']; ?>'><?php echo @$_POST['prev_class']; ?>
<?php // dynamic drop-down list     
foreach ($classes as $class) {
    echo "<option>$class</option>\n";
} ?>
</select>
      </td>
      
      <td>
            <select name='new_class' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['new_class']; ?>'><?php echo @$_POST['new_class']; ?>
<?php // dynamic drop-down list     
foreach ($classes as $class) {
    echo "<option>$class</option>\n";
} ?>
</select>
     </td>
 
<td>
<select name='new_classteacher' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['new_classteacher']; ?>'><?php echo @$_POST['new_classteacher']; ?>
<?php // dynamic drop-down list     
foreach ($teachers as $teacher) {
    echo "<option>$teacher</option>\n";
} ?>
</select>
      </td><td><button name="go">Fetch</button></td>
      
       </tr>
<?php if(isset($_POST['go'])){
    $prev_year = $_POST['prev_year'];
    //$new_year = $_POST['new_year'];
    $prev_class = $_POST['prev_class'];
    //$new_class = $_POST['new_class'];
    //$new_classteacher = $_POST['new_classteacher'];
    
    $fsql = "select * from students where year = '".$prev_year."' and level = '".$prev_class."' and status = 'Closed' and school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
    $fresult = mysqli_query($cnx, $fsql);
    while($frow = mysqli_fetch_array($fresult)){
        ?>
       <tr><td><input type="hidden" value="<?php echo $frow['username']; ?>" name="user[]" /><?php echo $frow['username']; ?></td>
           <td><input type="hidden" value="<?php echo $frow['fullname']; ?>" name="full[]" /><?php echo $frow['fullname']; ?></td>
           <td><input type="checkbox" value="<?php echo $frow['username']; ?>" name="checkbox[]" /></td>
       </tr>
          
  <?php }

    ?>
<tr><td><br /></td></tr>
<tr><td><button type="submit" name="submit">Promote</button></td></tr>
<?php } ?>
</table>

</form>

     
    </div>
          <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    </div>
</div>   

    
<script type='text/javascript'>
$(document).ready(function() {
$('#go').pagination();

 });
</script>
</body>
</html>
