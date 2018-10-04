<?php
//process
   
//get subjs for managing 
$c = "select * from classes where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by class";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table">
    <tr><td><label>Classes</label></td><td><label>Teacher Assigned</label></td></tr>
    <tbody id='go'>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['class']; ?></td><td><?php echo $crow['classteacher']; ?></td>
        
   
   <td><a href='edit_class.php?cmd=editclass&id=<?php echo $id;?>'> Edit Class </a> </td>
   <td><a href='delete_class.php?cmd=deleteclass&id=<?php echo $id;?>'> Delete Class </a> </td>
    </tr>
  <?php } ?>
    </tbody>      
</table>


     