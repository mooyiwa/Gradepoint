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
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
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
                //$student = $_POST['student'];
                $fullname = $_POST['fullname'];
                $sex = $_POST['sex'];
        
                $phone = $_POST['phone'];
                
                $usql= "update students set 
                                             fullname ='$fullname',
                                             sex = '$sex',
                                   
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
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>          
       <form action="" method="POST">
           <table>

               <tr><th></th><td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
               <tr><th>Student ID:</th><td style="padding: 6px 11px"><?php echo $student; ?></td></tr>
               <tr><th>Full Name:</th><td><input type="text" name="fullname" value="<?php echo $fullname; ?>" /></td></tr>
               <tr><th>Gender:</th><td><input type="text" name="sex" value="<?php echo $sex; ?>" /></td></tr>
     
               <tr><th>Phone:</th><td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td></tr>
              
               <tr><th></th><td><button type="submit" name="submit">Edit</button></td></tr>
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
