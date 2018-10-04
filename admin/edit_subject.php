<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
//the subject details edit
            if(isset($_GET['cmd']))
             {
             $id = $_GET['id'];
             $sql = "select * from subjects where id = '$id'";
             $result = mysqli_query($cnx,$sql);
             $row = mysqli_fetch_array($result);
             $old_subject = $row['subject'];
                    
            }
 // the edit
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $subject = $_POST['subject'];
              
                
                $usql= "update subjects set subject ='$subject'
                                            
                                              where id = '$id' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
                
                $result = mysqli_query($cnx,$usql);
                
                ## 
                $ssql= "update results set subject ='$subject'
                                            
                                              where subject = '$old_subject' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
                
                $sresult = mysqli_query($cnx,$ssql); 
                
                if($result || $sresult){
     $msg = 'Subject Edited!';
     
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
               <tr><th>Subject:</th>
                   <td><input type="text" name="subject" placeholder="<?php echo $old_subject; ?>" value="<?php echo $_POST['subject']; ?>" /></td>
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
