<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the subject details edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from students where id = '$id'";
             $sresult = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($sresult);
             $student = $row['username'];
             $fullname = $row['fullname'];
             $sex = $row['sex'];
             $address = $row['address'];
             $email = $row['email'];
             $phone = $row['phone'];
                  
            }
 // the edit
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $student = $_POST['student'];
                $fullname = mysqli_real_escape_string($cnx,$_POST['fullname']);
                $sex = $_POST['sex'];
                $address = mysqli_real_escape_string($cnx,$_POST['address']);
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                $usql= "update students set 
                                             fullname ='$fullname',
                                             sex = '$sex',
                                             address = '$address',
                                             email = '$email',
                                             phone = '$phone'
                
                                              where id = '$id'";
                $result = mysqli_query($cnx,$usql);
         
                   if($result){
     $msg = 'Record Edited!';
     
 }     
                
            }
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
         <?php if(isset($_POST['submit']) && $result) { echo "<p class='msg'>",$msg,"</p>","\n";} ?>
       <form action="" method="POST">
           <table>

               <tr><th></th><td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
               <tr class="bolder"><th>Student ID:</th><td><input type="hidden" name="student" value="<?php echo $student; ?>" /><?php echo $student; ?></td></tr>
               <tr class="bolder"><th>Full Name:</th><td><input type="text" name="fullname" value="<?php echo stripslashes($fullname); ?>" /></td></tr>
               <tr class="bolder"><th>Gender:</th><td><input type="text" name="sex" value="<?php echo $sex; ?>" /></td></tr>
               <tr class="bolder"><th>Address:</th><td><input type="text" name="address" value="<?php echo stripslashes($address); ?>" /></td></tr>
               <tr class="bolder"><th>Email:</th><td><input type="text" name="email" value="<?php echo $email; ?>" /></td></tr>
               <tr class="bolder"><th>Phone:</th><td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td></tr>
              
               <tr class="bolder"><th></th><td><button type="submit" name="submit">EDIT</button></td></tr>
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
