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
                    
            }
 // the edit
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $class = $_POST['class'];
              
                
                $usql= "update classes set class ='$class'
                                            
                                              where id = '$id'";
                
                $result = mysqli_query($cnx,$usql);
                
                if($result){
     $msg = 'Class Edited!';
     
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
               <tr><th>Class:</th>
                   <td><input type="text" name="class" value="<?php echo $class; ?>" /></td>
               </tr>
             
              
               <tr><th></th><td><button type="submit" name="submit">Edit</button></td></tr>
           </table>
       </form>
          
    </div>
     
       <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    

</div>   
	
</body>
</html>
