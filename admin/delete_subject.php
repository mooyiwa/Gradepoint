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
             $subject = $row['subject'];
                    
            }
 // the del
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $subject = $_POST['subject'];
                
                $usql= "delete from subjects where id = '$id'"; 
               
                $result = mysqli_query($cnx,$usql);
           if($result){
     $msg = 'Subject Deleted!';
     
 }
    }
?>
<!DOCTYPE html>
<html>
<head>    
<title></title>

<link rel="stylesheet" type="text/css" href="../css/1200.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 
 
</head>
<body class="admin">
  
<div class="container">
     <div class="grid_2 logo"><img src="../img/logo.png" /></div>
     <div class="grid_10 workarea alpha">
<?php if(isset($_POST['submit']) && $result) {echo "<p class='msg'>",$msg,"</p>","\n";} ?>          
       <form action="" method="POST">
           <table>
               <tr><th></th><td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
               <tr><th>Subject:</th>
                   <td><input type="text" name="subject" value="<?php echo $subject; ?>" /></td>
               </tr>
              
               <tr><th></th><td><button type="submit" name="submit">DELETE</button></td></tr>
           </table>
       </form>
          
    </div>
    
      <div class="grid_2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
</div>   
	
</body>
</html>
