<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
       
 //get student ids for drop down
   $ssql = "select username from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status != 'Closed' order by username";
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
        <select name='sid' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['sid']; ?>'><?php echo @$_POST['sid']; ?>
<?php // dynamic drop-down list     
foreach ($students as $student) {
    echo "<option>$student</option>\n";
} ?>
</select>
    </td></tr>
<tr><td><label>Term</label></td></tr>
<tr><td>
        <select name='term' value='' class="select min" required=""><?php echo @$_POST['term']; ?>

<option selected value='<?php echo @$_POST['term']; ?>'> <?php echo @$_POST['term']; ?>
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
<tr><td><button type="submit" name="submit" />Trace Records</button></td></tr>

</table></form>  
<?php 
  //process

  if(isset($_POST['submit'])){

    $year = $_POST['year'];
    $term = $_POST['term'];
    $sid = $_POST['sid'];
    
//get results per term
  if($_POST['term'] == 1){ ?>
         <table class="table">
       <tr><th>Subject</th><th>CA</th><th>Exam</th><th>Total</th></tr>     
            <?php
$c = "select id,subject,ca1,exam1,total1 from results where year ='$year' and studentID = '".$sid."'";
$cresult = mysqli_query($cnx,$c);
while($crow = mysqli_fetch_array($cresult)){ ?>

<tr class="bolder"><td><?php echo $crow['subject']; ?></td><td><?php echo $crow['ca1']; ?></td><td><?php echo $crow['exam1']; ?></td><td><?php echo $crow['total1']; ?></td>
   <td><a href='edit_scores_1.php?cmd=editscore&id=<?php echo $crow['id'];?>'> Edit </a> </td>
   <td><a href='delete_scores_1.php?cmd=delscore&id=<?php echo $crow['id'];?>'> Delete </a> </td>
</tr>
  <?php  }
     } 
     
   elseif($_POST['term'] == 2){ ?>
         <table class="table">
       <tr><th>Subject</th><th>CA</th><th>Exam</th><th>Total</th></tr>     
            <?php
$c = "select id,subject,ca2,exam2,total2 from results where year ='$year' and studentID = '".$sid."'";
$cresult = mysqli_query($cnx,$c);
while($crow = mysqli_fetch_array($cresult)){ ?>

<tr class="bolder"><td><?php echo $crow['subject']; ?></td><td><?php echo $crow['ca2']; ?></td><td><?php echo $crow['exam2']; ?></td><td><?php echo $crow['total2']; ?></td>
   <td><a href='edit_scores_2.php?cmd=editscore&id=<?php echo $crow['id'];?>'> Edit </a> </td>
   <td><a href='delete_scores_2.php?cmd=delscore&id=<?php echo $crow['id'];?>'> Delete </a> </td>
</tr>
  <?php  }
     } 
     
     
  elseif($_POST['term'] == 3){ ?>
         <table class="table">
       <tr><th>Subject</th><th>CA</th><th>Exam</th><th>Total</th></tr>     
            <?php
$c = "select id,subject,ca3,exam3,total3 from results where year ='$year' and studentID = '".$sid."'";
$cresult = mysqli_query($cnx,$c);
while($crow = mysqli_fetch_array($cresult)){ ?>

<tr class="bolder"><td><?php echo $crow['subject']; ?></td><td><?php echo $crow['ca3']; ?></td><td><?php echo $crow['exam3']; ?></td><td><?php echo $crow['total3']; ?></td>
   <td><a href='edit_scores_3.php?cmd=editscore&id=<?php echo $crow['id'];?>'> Edit </a> </td>
   <td><a href='delete_scores_3.php?cmd=delscore&id=<?php echo $crow['id'];?>'> Delete </a> </td>
</tr>
  <?php  }
     } 
  }?>
</table>
  
                 
    </div>
            <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
         </div> 
    </div>
</div>   
	
</body>
</html>
