<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the subject details edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from school where id = '$id'";
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
             $school = $row['name'];
             $address = $row['address'];
          
                  
            }
 // the delete
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                //$school = $_POST['name'];
                //$address = $_POST['address'];
             
                
                $dsql= "delete from school where id = '$id'";
                
                $result = mysqli_query($cnx,$dsql);
                
                if($result){
     $msg = 'Record Deleted!';
     
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
               <tr><th>School Name:</th><td><?php echo $school; ?></td></tr>
               <tr><th>Address:</th><td><?php echo $address; ?></td></tr>    
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
