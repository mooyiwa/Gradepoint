<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create       
       include('includes/create_school.inc.php'); 
      
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

<tr><td><label>Name of School</label></td></tr>
<tr><td><input type='text' name='name' class="ent" style="width: 150%" value="<?php echo $_POST['name']; ?>" required /></td></tr>
<tr><td><label>School Address</label></td></tr>
<tr><td><input type='text' name='address' style="width: 150%" class="ent" value="<?php echo $_POST['address']; ?>" required /></td></tr>

  
   <tr><td><button type='submit' name='submit'>Create</button></td></tr>


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
