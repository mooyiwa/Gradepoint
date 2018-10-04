<?php
//process
   
//get subjs for managing 
$c = "select * from categories where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by category";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table" style="padding: 30px 15px 15px 40px">
   
    
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['category']; ?></td>
        
   
   <td><a href='edit_subject.php?cmd=editsub&id=<?php echo $id;?>'> Edit </a> </td>
    </tr>
  <?php } ?>
        
</table>


     