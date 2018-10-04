<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
   include('../includes/hijack_sess.inc.php'); 
   
 // create
   include('includes/create_subjects.inc.php');

       
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
   <div class="grid_6 alpha"></div>
   <div class="grid_4"></div>
   <div class="grid_2 logo">  
   </div>
    
   <div class="grid_2"><?php include('includes/dash.inc.php'); ?></div>
   <div class="grid_7 workarea">
 <?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";}
   else echo mysqli_error($cnx);?>          
<form  action="" method="POST" class="form">
<table class="table">
<tr><td><label>No of Subjects</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" required /></td>
    <td><input type="submit" name="go" value="Go"/></td></tr>


<?php

  if(isset($_POST['go'])){
echo"<tr>","<td>Subject(s)</td>","</tr>";
for($i=1; $i<=@$_POST['fields']; $i++){ ?>

<tr><td><input type='text' name='subject[]' class="ent" required="" /></td></tr>

  <?php } ?>
   <tr><td><button type='submit' name='submit'>Create</button></td></tr>
<?php }
?>

</table>
</form>
                 
    </div>
    
   
</div>   
	
</body>
</html>
