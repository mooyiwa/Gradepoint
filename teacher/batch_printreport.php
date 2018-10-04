<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//clear position inputs by user
       $isq = "delete from positions where authID = '".$_SESSION['logname']."'";
       $ires = mysqli_query($cnx,$isq);
       
 //get student ids for drop down
   /**$ssql = "select username from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND teacherID = '".$_SESSION['logname']."' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $students[] = $srow['username'];
       
   } */

    //get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   } 
  //process

  if(isset($_POST['submit'])){

    $year = $_POST['year'];
    $term = $_POST['term'];

//get class  
$c = "select level from students where teacherID ='".$_SESSION['logname']."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND year = '$year'";
$cresult = mysqli_query($cnx,$c);
$crow = mysqli_fetch_array($cresult);
$class = $crow['level'];


$_SESSION['year'] = $year;
$_SESSION['term'] = $term;
$_SESSION['class'] = $class;

   if($_SESSION['term'] == 1){
header("Location: ../batch_print_1.php");
   }
   if($_SESSION['term'] == 2){
header("Location: ../batch_print_2.php");
   } 
   if($_SESSION['term'] == 3){
header("Location: ../batch_print_3.php");
   }   
     }     
?>
<!DOCTYPE html>
<html>
<head>    
<title></title>

<link rel="stylesheet" type="text/css" href="../css/1200.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 
 
</head>
<body class="admin">
  
<div class="container">
     <div class="grid_2 logo"><img src="../img/logo.png" /></div>
     <div class="grid_10 workarea alpha">
        <form  action="" method="POST">
<table>
     
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
            <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
         </div> 

</div>   
	
</body>
</html>
