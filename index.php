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
    
## clear empties
$esql = "delete from results where teacherID = '' or school = ''";
mysqli_query($cnx,$esql);

	 
?>
<?php include('header.php'); ?>
<body class="home">

<div class="container">
    <div class="row">
	
        <div class="offset1 span4 login">
            
            <?php include('includes/login.inc.php'); ?>
            
                       	   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form login pushdown">
          <img src="img/logo.png" />
                            <table>
                                <tr><td><?php echo @$err; ?></td></tr>
                                <tr><td><label style="font-weight:normal;font-size: 1.2em;">Username:</label></td></tr>
                                <tr><td><input type='text' name='user' style='height:28px;width:255px;' /></td></tr>
                                <tr><td><label style="font-weight:normal;font-size: 1.2em;">Password:</label></td></tr>
                                <tr><td><input type='password' name='pass' style='height:28px;width:255px;' /></td></tr>
                                <tr><td><button type="submit" name="submit" style="margin-top: 3px">Sign In</button></td></tr>
                                    
                                    
                                
                            </table>
                        </form>
        </div>
        <div class="span2 logo"></div>
     </div>   
</div><!--class="container" -->
	
</body>
</html>
