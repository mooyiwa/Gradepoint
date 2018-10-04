<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
      
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
       
     <?php include('includes/getclasses.inc.php');?>            
    </div>
     
                       <div class="span2 dash">
       <?php include('includes/dash.inc.php'); ?>
          </div>
    </div>

</div>   
	
<script type='text/javascript'>
$(document).ready(function() {
$('tbody#go').pagination();

 });
</script>
</body>
</html>
