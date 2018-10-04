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

 include('includes/close_school.inc.php');     
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
        
<?php if(isset($_POST['submit']) && $result) { echo "<p class='msg'>",$msg,"</p>","\n";} ?>
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

<tr><td><button type="submit" name="submit">Close School Year</button></td></tr>

</table>
</form>    
              
    </div>
     <div class="span2 dash"><?php include('includes/dash.inc.php'); ?></div>   
    </div>
</div>   
	
</body>
</html>
