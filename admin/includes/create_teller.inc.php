<?php 
// create admin
if(isset($_POST['submit'])){
   $fullname = $_POST['fullname'];
   $user = $_POST['user'];
   $email = $_POST['email'];
   $psw = $_POST['psw'];
   $bank = $_POST['bank'];
   
   
 //create proper
   $csql = "insert into users set fullname = '$fullname',
                                    username = '$user',
                                    password = md5('$psw'),
                                    temail = '$email',
                                    bank = '$bank',
                                    who = 'teller' ";
   $result = mysqli_query($cnx,$csql);
   $msg = 'Teller Account Created!';
  // send mail
	$to = $email;
	$subject = "Teller Account creation details";
        $from = "Admin@eschool.com";
	
	
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
$message = "<html><body>";
$message .= "<h2>Account Creation Details</h2>";
$message .= "<table rules='all' cellpadding='8'>";

$message .= "<tr><td><b>Username:</b></td><td>" . $mid . "</td></tr>";
$message .= "<tr><td><b>Password:</b></td><td>" .$psw ."</td></tr>";

$message .= "<tr><td>See the link provided below to access your account:</td></tr>";
$message .= "<tr><td>http://</td></tr>";

$message .= "</table>";
$message .= "</body></html>";

	
	$ok = @mail( $to, $subject, $message, $headers );    
}
  
  ?>
<?php if(isset($_POST['submit']) && $result) { echo "<p class='msg'>",$msg,"</p>","\n";} else echo mysqli_error($cnx);?>
<form action="" method="POST" class="form">
    <ul>
        <li><label>Full Name of Bank Teller</label></li>
        <li><input type="text" name="fullname" class="ent" value="<?php echo $_POST['fullname']; ?>" /></li>
        <li><label>E-mail</label></li>
        <li><input type="text" name="email" class="ent" value="<?php echo $_POST['email']; ?>" /></li>
                <li><label>Username</label></li>
        <li><input type="text" name="user" class="ent" value="<?php echo $_POST['user']; ?>" /></li>
                <li><label>Set Password</label></li>
        <li><input type="password" name="psw" class="ent" id="pword" /></li>
                <li><label>Re-Type Password</label></li>
        <li><input type="password" name="psw2" class="ent" /></li>
                <li><label> for Bank</label></li>
        <li>
         <select name='bank' value='' style="width:205px" class=" select ent min" required>
<?php // dynamic drop-down list  -- subcats
echo"<option selected value=''> ----- ";
foreach ($banks as $bank) {
    echo "<option>$bank</option>\n";
} ?>
</select>
        </li>
                
        <li>
            <button type="submit" name="submit">Create Teller</button>
        </li>
    </ul>
</form>