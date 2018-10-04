<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//clear position inputs by user
       $isq = "delete from positions where authID = '".$_SESSION['logname']."'";
       $ires = mysqli_query($cnx,$isq);
       
 //get student ids for drop down
   $ssql = "select distinct username from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status != 'Closed' AND teacherID = '".$_SESSION['logname']."' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $students[] = $srow['username'];
       
   } 

    //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   } 
  //process

  if(isset($_POST['submit'])){

    $year = $_POST['year'];
    $term = $_POST['term'];
    $id = $_POST['id'];
//get class  
$c = "select level from students where username ='$id' AND year = '$year'";
$cresult = mysqli_query($cnx,$c);
$crow = mysqli_fetch_array($cresult);
$class = $crow['level'];


$_SESSION['year'] = $year;
$_SESSION['term'] = $term;
$_SESSION['id'] = $id;
$_SESSION['class'] = $class;
   if($_SESSION['term'] == 1){
header("Location: ../print_1.php");
   }
   if($_SESSION['term'] == 2){
header("Location: ../print_2.php");
   } 
   if($_SESSION['term'] == 3){
header("Location: ../print_3.php");
   }   
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
     
<tr><td><label>Student ID</label></td></tr>
<tr><td>
        <select name='id' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['id']; ?>'><?php echo @$_POST['id']; ?>
<?php // dynamic drop-down list     
foreach ($students as $student) {
    echo "<option>$student</option>\n";
} ?>
</select>
    </td></tr>
<tr><td><label>Term</label></td></tr>
<tr><td>
        <select name='term' value='' class="select min" required=""><?php echo @$_POST['term']; ?>

<option selected value='<?php echo @$_POST['term']; ?>'> --
<option>1</option>
<option>2</option>
<option>3</option>


</select>
    </td><td></tr>
<tr><td><label>Session/Year</label></td></tr>
<tr><td>
        <select name='year' value='' class="select min" required="">
 
<option selected value='<?php echo @$_POST['year']; ?>'><?php echo @$_POST['year']; ?>
<?php // dynamic drop-down list
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
    </td></tr>
<tr><td><button type="submit" name="submit" />Print</button></td></tr>

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
