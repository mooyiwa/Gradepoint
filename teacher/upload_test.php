<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
 //get student ids for drop down
   $ssql = "select username from students where teacherID = '".$_SESSION['logname']."' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $students[] = $srow['username'];
       
   } 
  //get subjects for drop down
   $ssql = "select subject from subjects order by subject";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $subjects[] = $srow['subject'];
       
   }  
     //get grades for drop down
   $grsql = "select grade from grades order by grade";
   $grresult =  mysqli_query($cnx,$grsql);
   while($grrow = mysqli_fetch_array($grresult)){
          $grades[] = $grrow['grade'];
       
   }
    //get session for drop down
   $ql = "select session from sessions order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
   } 
  //do upload

  if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $ca = $_POST['ca'];
    $exam = $_POST['exam'];
    $sid = $_POST['id'];
    $grade = $_POST['grade'];
    $positions = $_POST['positions'];

  $limit = count($subject);

for($i=0;$i<$limit;$i++) {

       $sql ="update results set 
                                  
                                   ca2 = '".$ca[$i]."',
                                   exam2 = '".$exam[$i]."',
                                   total2 = '".$ca[$i]."' + '".$exam[$i]."',
                                   grade2 = '".$grade[$i]."',
                                   positions2 = '".$positions[$i]."'
                                   
                                       where subject = '".$subject[$i]."'
                                           and studentID = '".$sid."'
                                          
                                           and year = '".$_POST['year']."'
                                           and teacherID = '".@$_SESSION['logname']."'
                                   ";
        $result = mysqli_query($cnx,$sql);
          if($result){
     $msg = 'Records Uploaded Successfully!';
     
 }//else{ $err = 'Record already exists!'; }
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
       <?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} 
             else{echo mysqli_error($cnx);}
       ?>
        <form  action="" method="POST">
<table>
        <tr><td> 
    </td></tr>

<tr><td><label>Student ID</label></td></tr>
<tr><td>
        <select name='id' value='' class="select" required="">
 
<option selected value='<?php echo $_POST['id']; ?>'><?php echo $_POST['id']; ?>
<?php // dynamic drop-down list    
foreach ($students as $student) {
    echo "<option>$student</option>\n";
} ?>
</select>
    </td></tr>

<tr><td><label>Session/Year</label></td></tr>
<tr><td>
        <select name='year' value='' class="select" required="">
<option selected value='<?php echo $_POST['year']; ?>'><?php echo $_POST['year']; ?>
    <?php // dynamic drop-down list 
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
    </td><td></tr>

<tr><td><label>No of Subject Fields</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" required="" /></td>
    <td><input type="submit" name="go" value="Go"/></td></tr>

</table><table>


<?php

  if(isset($_POST['go'])){
echo"<tr>","<td>Subject</td>","<td>CA</td>","<td>Exam</td>","<td>Grade</td>","<td>Position</td>","</tr>";
for($i=1; $i<=@$_POST['fields']; $i++){ ?>
 
 <tr><td>
         <select name='subject[]' value='' class="select" required="">
<?php // dynamic drop-down list 
echo"<option selected value=''>";
foreach ($subjects as $subject) {
    echo "<option>$subject</option>\n";
} ?>
</select>
     </td>
     <td><input type='text' name='ca[]' size="6" required="" /></td>
     <td><input type='text' name='exam[]' size="6" required="" /></td>
       
      <td>
          <select name='grade[]' value='' class="select" required="">
<?php // dynamic drop-down list 
echo"<option selected value=''>";
foreach ($grades as $grade) {
    echo "<option>$grade</option>\n";
} ?>
</select>
      </td>
      <td><input type='text' name='positions[]' required="" /></td></tr>

   <?php } ?>
 <tr><td><button type="submit" name="submit">Upload</button></td></tr>
<?php } 
?>

</table>


</form>    
                 
    </div>
         <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
         </div>

</div>   
	
</body>
</html>
