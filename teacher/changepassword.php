<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reg Stud       
       include('includes/change_pass.inc.php'); 
       
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
<form action="" method="POST">
<table>
    <tr><td><?php if(isset($_POST['submit']) && $result) { echo "<p>",$msg,"</p>","\n";} ?></td></tr>

<tr><td><label>New Password</label></td></tr>
<tr><td><input type="password" name="newpass" class="ent" required="" /></td></tr>
<tr><td><button type="submit" name="submit">Change</button></td></tr>
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
