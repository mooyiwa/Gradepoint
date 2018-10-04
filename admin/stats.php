<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php');
       
 //get school yr for drop down
   $ssql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $sessions[] = $srow['session'];
       
   }        

//get all teachers
   $ql = "select * from users where who = 'teacher' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
   $qlresult =  mysqli_query($cnx,$ql);
   $nt = mysqli_num_rows($qlresult);
   //get all students
   if(isset($_POST['submit'])){
   $sl = "select username from students where year = '".$_POST['session']."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
   $slresult =  mysqli_query($cnx,$sl);
   $ns = mysqli_num_rows($slresult);
   }
   //get all bursars
   $bl = "select * from users where who = 'bursar' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
   $blresult =  mysqli_query($cnx,$bl);
   $nb = mysqli_num_rows($blresult);
              
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
     
<tr><td><label>School Year</label></td></tr>
<tr><td>
     <select name='session' value='' class="min" required=""> 
<option selected value='<?php echo @$_POST['session']; ?>'><?php echo @$_POST['session']; ?>
<?php // dynamic drop-down list
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
    </td></tr>

<tr><td><button type="submit" name="submit">Get Stats</button></td></tr>

</table>
</form>   
      
         <p style="padding-left: 15px;font-size: 1.2em">Students : <?php echo $ns; ?></p>
     <p style="padding-left: 15px;font-size: 1.2em">Lecturers : <?php echo $nt; ?></p>
     <p style="padding-left: 15px;font-size: 1.2em">Bursars : <?php echo $nb; ?></p>
  
           
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
