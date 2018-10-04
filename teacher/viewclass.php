<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php');

//get session for drop down
   $ql = "select session from sessions where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status = 'Open' order by session";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $sessions[] = $qlrow['session'];
       
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
        <form  action="" method="POST">
<table>
     
<tr><td><label>Active Session</label></td></tr>
    <tr>  <td>
            <select name='year' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['year']; ?>'><?php echo @$_POST['year']; ?>
<?php // dynamic drop-down list     
foreach ($sessions as $session) {
    echo "<option>$session</option>\n";
} ?>
</select>
      </td>
      
      </tr> 

<tr><td><button type="submit" name="submit">View Class</button></td></tr>

</table>


</form>    
     <?php include('includes/class.inc.php');?>            
    </div>
    
         <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
         </div> 
        </div>
</div>   

<script type='text/javascript'>
$j = jQuery.noConflict(); 
$j(document).ready(function() {
$j('tbody#go').pagination();

 });
</script>


</body>
</html>
