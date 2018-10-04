<?php
//process
   
//get subjs for managing 
$c = "select * from subjects where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by subject";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table">
    <tr><td><label>Subjects</label></td></tr>
    
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['subject']; ?></td>
        
   
   <td><a href='edit_subject.php?cmd=editsub&id=<?php echo $id;?>'> Edit </a> | <a href='delete_subject.php?cmd=delsub&id=<?php echo $id;?>'> Delete </a></td>
    </tr>
  <?php } ?>
        
</table>


     