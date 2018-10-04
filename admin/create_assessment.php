<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/create_assess.inc.php'); 
   
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
         
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>           
<form  action="" method="POST">
<table>
<tr><td><label>Enter no of Types to create. e.g 2</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" /></td>
    <td><input type="submit" name="go" value="Go"/></td></tr>


<?php

  if(isset($_POST['go'])){
      ?>

<tr><td>Assessment Category e.g Pychomotor Skills</td></tr>
<?php
for($i=1; $i<=@$_POST['fields']; $i++){ ?>

<tr><td><input type='text' name='assess[]' value="<?php echo $_POST['assess']; ?>" class="ent" required="" /></td>
    </tr>

  <?php } ?>
   <tr><td><button type='submit' name='submit'>Create</button></td></tr>
<?php }
?>

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
