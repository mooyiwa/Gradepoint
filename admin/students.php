<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
 //get classes for drop down
   $ssql = "select class from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $classes[] = $srow['class'];
       
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
     
<tr><td><label>Class</label></td></tr>
<tr><td>
        <select name='class' value='' class="select min" required=""> 
<option selected value='<?php echo @$_POST['class']; ?>'><?php echo @$_POST['class']; ?>
<?php // dynamic drop-down list
foreach ($classes as $class) {
    echo "<option>$class</option>\n";
} ?>
</select>
    </td></tr>

<tr><td><button type="submit" name="submit" />Get Students</button></td></tr>

</table>


</form>    
     <?php include('includes/getstudents.inc.php');?>            
    </div>
     
                       <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    </div>

</div>   
	
<script type='text/javascript'>
$j = jQuery.noConflict(); 
$j(document).ready(function() {
$j('tbody#go').pagination();

 });
</script>
</body>
</html>
