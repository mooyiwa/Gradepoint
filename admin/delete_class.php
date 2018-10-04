<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the class details  for edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from classes where id = '$id'";
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
             $class = $row['class'];
             $classteacher = $row['classteacher'];
                    
            }
 // the del
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                //$class = $_POST['class'];
                //$classteacher = $_POST['classteacher'];
              
                
                $usql= "delete from classes where id = '$id'";
                
                $result = mysqli_query($cnx,$usql);
                
                if($result){
     $msg = 'Class Deleted!';
     
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
               <tr><th>Class:</th><th>Teacher Assigned</th></tr><tr>
                   <td style="border: 1px solid #fff;padding: 6px"><input type="hidden" name="class" value="<?php echo $class; ?>" /><?php echo $class; ?></td>
                   <td style="border: 1px solid #fff;padding: 6px"><input type="hidden" name="class" value="<?php echo $classteacher; ?>" /><?php echo $classteacher; ?></td>
               </tr>
             
             
              
               <tr><td><button type="submit" name="submit" style="margin-top: 8px;">Delete</button></td></tr>
           </table>
       </form>
          
    </div>
     
       <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    

</div>   
	
</body>
</html>
