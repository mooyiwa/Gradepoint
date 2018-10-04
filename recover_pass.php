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
    
include('includes/login.inc.php');

//get secret questions for drop down
   $ssql = "select secret from secret order by secret";
   $sresult =  mysqli_query($cnx,$ssql);
   while($srow = mysqli_fetch_array($sresult)){
          $secrets[] = $srow['secret'];
   }
	 
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
<link rel="stylesheet" type="text/css" media="screen" href="css/1200.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui-lightness/jquery-ui-1.7.3.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/fvalidform.css" />


  <!-- Link js -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery-ui-1.7.3.custom.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/pgscrollscript.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/fvalidscript.js"></script>
 
 
</head>
<body class="home">
  <div class="container">
    <div class="grid_7"></div>
      <div class='grid_3 login '>
         
           	       <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form pushdown">
            
                            <table>
                                      <?php
                                     if(isset($_POST['recover']))
                                          { 
                                         $email = $_POST['email'];
                                         $secret = $_POST['secret'];
                                         $answer = $_POST['answer'];
                                         $sql ="select username,email,secret,answer from users where email = '$email' AND secret = '$secret' AND answer = '$answer'";
                                         $result = mysqli_query($cnx,$sql);
                                         if(mysqli_num_rows($result) > 0){
                                             $row = mysqli_fetch_array($result);
                                             $trueemail = $row['email'];
                                             $user = $row['username'];
                                             $pass = time();
                                             
                                             //operation- insert new temporary pass
                                             $insql = "update users set password1 = md5('$pass'),
                                                                          password2 = md5('$pass')
                                                                          where username = '$user'"; 
                                            $inresult = mysqli_query($cnx,$insql);
                                             
        //operation- send mail
	
	$to = $trueemail;
	$subject = "Your Changed Login Credentials";

	$random_hash = "zzz582x";

	ob_start();
	?>
	To: Provider
	From: www.YouWork.com
	MIME-Version: 1.0
	Content-Type: multipart/alternative;
				boundary="==Multipart_Boundary_<?php echo($random_hash); ?>" 
	<?php 
	$headers = ob_get_clean(); 
	ob_start(); ?>

	   Your login credentials has been changed.  
           Your username: <?php echo $user ;?>
	   Your password: <?php echo $pass; ?> 
           Click on the link provided below to access your account.
           The link: http://www.YouWork.com/login.php
	
						
	Thank you.			
	Sincerely,
	YouWork.com
	
	<?php
	$message = ob_get_clean();
	
	$ok = @mail( $to, $subject, $message, $headers );
	
	if($inresult && $ok){
            echo"<tr><td>","Password Reset! See your email box.","</td></tr>";
        }
                       
                                         }
                                         else{
                                        
                                        echo"<tr><td>","Not a registered user!","</td></tr>";
                                       }
                                       
                                     }
                                    ?>
                                <tr><td>Enter your E-mail address *</td></tr>
                                <tr><td><input type='text' name='email' style='height:28px;width:205px;' /></td></tr>
                                <tr><td>What's your secret question? *</td></tr>
                                <tr><td>
<select name='secret' value='' style="height:28px;width:205px" class="ent">
<?php // dynamic drop-down list  -- subcats
echo"<option selected value=''> ----- ";
foreach ($secrets as $secret) {
    echo "<option>$secret</option>\n";
} ?>
</select>
</td></tr>
                                <tr><td>What's your secret answer? *</td></tr>
                                <tr><td><input type='text' name='answer' style='height:28px;width:205px;' /></td></tr>
                                <tr><td><input type='submit' id='submit' name='recover' value='Recover Password' class="find" style="font-size: 1.4em;" /></td></tr>
                              
                                
                            </table>
                        </form>
          <?php 

          ?>
      </div>
      
                  <div class="grid_2">
     <?php //include('includes/logo.inc.php'); ?>

         </div>
      
      
     
      

      
   </div><!--container-->	
<?php include('includes/disabled.inc.php'); ?>	

</body>
</html>
