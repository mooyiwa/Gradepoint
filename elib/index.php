<?php
session_start();
ob_start();
include('cnx.php');

## we have a user on browser!
if(@$_SESSION['logname']){
   $isql = "select who from elib_users where username = '".$_SESSION['logname']."'"; 
   $iresult = mysqli_query($cnx,$isql);
   $irow = mysqli_fetch_array($iresult);
   $iwho = $irow['who'];
   $_SESSION['iwho'] = $iwho;
   
   header("Location: $iwho/index.php"); 
}##   
    

	 
?>
<!DOCTYPE html>
<head>
<title></title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

<!-- Link CSS -->
<link rel="stylesheet" type="text/css" media="screen" href="css/1200.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui-lightness/jquery-ui-1.7.3.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />



  <!-- Link js -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery-ui-1.7.3.custom.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/pgscrollscript.js"></script>

  <script type="text/javascript" src="js/fvalidscript.js"></script>


</head>
<body class="home">

<div class="container">
	<div class="grid_7 alpha"></div>
        <div class="grid_3">
            <h2 style="font-weight: normal;position: relative;top:20px;">eLibrary Portal</h2>
            <?php include('includes/login.inc.php'); ?>
                       	   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form pushdown">
            
                            <table>
                                <tr><td><label>Username:</label></td></tr>
                                <tr><td><input type='text' name='user' style='height:28px;width:255px;' /></td></tr>
                                <tr><td><label>Password:</label></td></tr>
                                <tr><td><input type='password' name='pass' style='height:28px;width:255px;' /></td></tr>
                                <tr><td><button type="submit" name="submit">Sign In</button></td></tr>
                                   
                                
                            </table>
                        </form>
        </div>
        <div class="grid_2 logo"></div>
        
</div><!--class="container" -->
	
</body>
</html>
