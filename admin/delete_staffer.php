<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the staffer details edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from users where id = '$id'";
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
             $staffer = $row['username'];
             $fullname = $row['fullname'];
             $sex = $row['tsex'];  
             $email = $row['temail'];
             $phone = $row['tphone'];
           
            }
 // the del
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $staffer = $_POST['staffer'];
                $fullname = $_POST['fullname'];
                $sex = $_POST['sex'];
           
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
        $usql= "delete from users where id = '$id'"; 
               
        $result = mysqli_query($cnx,$usql);
        
      if($result){
     $msg = 'Staff Record Deleted!';
     
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
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>           
       <form action="" method="POST">
           <table>

               <tr><th></th><td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
               <tr><th>Staff ID:</th><td><input type="text" name="staffer" value="<?php echo $staffer; ?>" /></td></tr>
               <tr><th>Full Name:</th><td><input type="text" name="fullname" value="<?php echo $fullname; ?>" /></td></tr>
               <tr><th>Gender:</th><td><input type="text" name="sex" value="<?php echo $sex; ?>" /></td></tr>
           
               <tr><th>Email:</th><td><input type="text" name="email" value="<?php echo $email; ?>" /></td></tr>
               <tr><th>Phone:</th><td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td></tr>
              
               <tr><th></th><td><button type="submit" name="submit">DELETE</button></td></tr>
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
