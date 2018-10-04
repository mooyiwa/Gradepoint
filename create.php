<?php
session_start();
ob_start();
include('cnx.php');


## we have a user on browser!
if(@$_SESSION['logname']){
   $isql = "select who from users where username = '".$_SESSION['logname']."'"; 
   $iresult = mysqli_query($cnx,$isql);
   $irow = mysqli_fetch_array($iresult);
   $iwho = $irow['who'];
   $_SESSION['iwho'] = $iwho;
   
   header("Location: $iwho/index.php"); 
}##   

// create       
   include('includes/create_account.inc.php'); 
   
?>
<?php include('header.php'); ?>
<body class="home">

<div class="container">
    <div class="row">
	
        <div class="offset1 span4 login">
           
  
              <img src="img/logo.png" /> 
                        <?php echo "<p class='msg'>",@$msg,"</p>","\n"; ?> 
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form login pushup">


<table>
<tr><td><label>Username</label></td></tr>
<tr><td><input type='text' name='user' class="ent" style="width: 150%" value="<?php echo $_POST['user']; ?>" required /></td></tr>
<tr><td><label>e-mail</label></td></tr>
<tr><td><input type='text' name='email' class="ent" style="width: 150%" value="<?php echo $_POST['email']; ?>" required /></td></tr>
<tr><td><label>Name of School</label></td></tr>
<tr><td><input type='text' name='name' class="ent" style="width: 150%" value="<?php echo $_POST['name']; ?>" required /></td></tr>
<tr><td><label>Location</label></td></tr>
<tr><td><input type='text' name='address' style="width: 150%" class="ent" value="<?php echo $_POST['address']; ?>" required /></td></tr>

  
<tr><td><button type='submit' name='submit'>Create Account</button></td></tr>


</table>
       </form>
        </div>
        <div class="span2 logo"></div>
     </div>   
</div><!--class="container" -->
	
</body>
</html>
