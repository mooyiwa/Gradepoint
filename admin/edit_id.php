<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php');       
       
//get studs for drop down
   $ssql = "select distinct username from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by level";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $studs[] = $srow['username'];
       
   }      
 
 
   include('includes/edit_id.inc.php'); 
?>
<!DOCTYPE html>
<html>
<head>    
<title></title>

<link rel="stylesheet" type="text/css" href="../css/1200.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
 
  <!-- Link js -->
  <script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="../js/jquery-ui-1.7.3.custom.min.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="../js/paginator.js"></script> 
</head>
<body class="admin">
  
<div class="container">
    
     <div class="grid_2 logo"><img src="../img/logo.png" /></div>
     <div class="grid_10 workarea alpha">
<?php if(isset($_POST['submit'])) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>           
<form  action="" method="POST">
<table>
     
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
<tr><td><label>New ID</label></td></tr> 
    <tr>  <td>
            <input type="text" name='new_id' class="select min" value="<?php echo $_POST['new_id'] ?>" required="required" />

      </td>
      
       </tr>

<tr><td><button type="submit" name="submit">Change ID</button></td></tr>

</table>


</form>
 
        
    </div>
          <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
</div>   

    
<script type='text/javascript'>
$(document).ready(function() {
$('#go').pagination();

 });
</script>
</body>
</html>
