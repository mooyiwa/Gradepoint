<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the subject details edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from sessions where id = '$id'";
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
             $session = $row['session'];
             
          
                  
            }
 // the edit
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $session = $_POST['session'];
             
                
                $usql= "update sessions set session ='".mysqli_real_escape_string($cnx,$session)."' 
                                            
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
               <tr><th>Session:</th><td><textarea type="text" name="session" value="<?php echo $_POST['session']; ?>"><?php echo $session; ?></textarea></td></tr>
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
