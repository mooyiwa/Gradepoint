<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// Reset       
      if(isset($_POST['submit'])) {
     $psw = $_POST['psw'];
     $usr = $_POST['usr'];

     
     $resql = "update `users` set `password` = md5('$psw')
                               
                                 where `username` = '".$usr."' ";
                              
     $reset = mysqli_query($cnx,$resql);
     if($reset){
     $msg = 'PASSWORD CHANGED!';
     }     
}

        //get all users for drop down
   $ssql = "select username from users where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' and who != 'student' and username != 'admin_sj1' and username != 'pinner' order by username";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $users[] = $srow['username'];
       
   } 
       
?>
<?php include('../includes/header.php'); ?>
 
 
</head>
<body class="admin">
  
<div class="container">
     <div class="row">
     <div class="span2"><img src="../img/logo.png" /></div>
     <div class="span10"> </div>
     </div>
    
    <div class="row"> 
    <div class="span10 alpha workarea">
         
         <?php if(isset($_POST['submit']) && $reset) { echo "<p class='msg'>",$msg,"</p>","\n";} ?>
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form">
               
              <table>
	<tr><td><label>User ID</label></td></tr>
<tr><td>
        <select name='usr' value='' class="select min" required="">
 
<option selected value='<?php echo $_POST['usr']; ?>'><?php echo $_POST['usr']; ?>
<?php // dynamic drop-down list    
foreach ($users as $user) {
    echo "<option>$user</option>\n";
} ?>
</select>
    </td></tr>						
                  <tr><td><label>New Password</label></td></tr>
                  <tr><td><input type="password" name="psw" id="pword" class="ent" /></td></tr>
	          <tr><td><label>ReEnter Password</label></td></tr>
                  <tr><td><input type="password" name="psw2" class="ent" /></td></tr>
             
                 <tr><td><button type="submit" name="submit">Change Password</button>
                         </td></tr>
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
