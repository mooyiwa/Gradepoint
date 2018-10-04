<?php
session_start();
ob_start();
include('cnx.php');


## we have a user on browser!
if(@$_SESSION['logname']){
   $isql = "select who from users where username = '".mysqli_real_escape_string($cnx,$_SESSION['logname'])."'"; 
   $iresult = mysqli_query($cnx,$isql);
   $irow = mysqli_fetch_array($iresult);
   $iwho = $irow['who'];
   $_SESSION['iwho'] = $iwho;
   
   header("Location: $iwho/index.php"); 
}##   
    
include('includes/login.inc.php');
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>

<!--ie6 fix-->
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js"
type="text/javascript"></script>
<![endif]-->
	
<!-- Link CSS -->
<link rel="stylesheet" type="text/css" media="screen" href="css/12c.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui-lightness/jquery-ui-1.7.3.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />


  <!-- Link js -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery-ui-1.7.3.custom.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/pgscrollscript.js"></script>
 
 
</head>
<body>
  <div class="container">

     
      
      <div class='grid_5 login '>
     
           	       <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form">
            
                            <table>
                                <tr><td><label>Username:</label></td></tr>
                                <tr><td><input type='text' name='user' style='height:28px;width:255px;' /></td></tr>
                                <tr><td><label>Password:</label></td></tr>
                                <tr><td><input type='password' name='pass' style='height:28px;width:255px;' /></td></tr>
                                    <tr><td><input type='submit' id='submit' name='submit' value='Sign In' class="find" style="font-size: 1.4em;" /></td></tr>
                                    <tr><td><p><a href="login.php?forgot=action" target="_blank">Forgot Password?</a></p></td></tr>
                                    <?php
                                     if(isset($_GET['forgot']))
                                          { 
                                         header('location: recover_pass.php');
                                          }
                                    ?>
                                
                            </table>
                        </form>
          <?php 

          ?>
      </div>
      
                  <div class="grid_2 ll">
     <?php include('includes/logo.inc.php'); ?>

         </div>
      
      
      <div class='clear'></div>
      <div class='grid_12 footer'>

         <?php include('includes/footer.inc.php'); ?>

      </div>
      <div class='clear'></div>
       <div class='grid_12 sponsors'>
           
       </div>
      

      
   </div><!--container-->	
<?php include('includes/disabled.inc.php'); ?>	

</body>
</html>
