<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 
// create classes      
       include('includes/create_assess_item.inc.php'); 
 //get assessment category(ies) for drop down
   $ql = "select cate from assessment where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
   $qlresult =  mysqli_query($cnx,$ql);
   while($qlrow = mysqli_fetch_array($qlresult)){
          $cates[] = $qlrow['cate'];
       
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
<form  action="" method="POST">
<table>
<tr><td>
            <select name='cate' value='' class="select min" required="">

<option selected value='<?php echo @$_POST['cate']; ?>'><?php echo @$_POST['cate']; ?>
<?php // dynamic drop-down list     
foreach ($cates as $cate) {
    echo "<option>$cate</option>\n";
} ?>
</select>
    </td></tr>    
<tr><td><label>Enter no of items to create. e.g 2</label></td></tr>
<tr><td><input type="text" name="fields" value="<?php echo @$_POST['fields']; ?>" class="ent" /></td>
    <td><input type="submit" name="go" value="Go"/></td></tr>


<?php

  if(isset($_POST['go'])){
      ?>

<tr><td>Assessment Item / Area</td></tr>
<?php
for($i=1; $i<=@$_POST['fields']; $i++){ ?>

<tr><td><input type='text' name='item[]' value="<?php echo $_POST['item']; ?>" class="ent" required="" /></td>
    </tr>

  <?php } ?>
   <tr><td><button type='submit' name='submit'>Create</button></td></tr>
<?php }
?>

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
