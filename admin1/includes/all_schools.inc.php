<?php
//get schools for managing 
$c = "select * from school order by name";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table">
    <tr><th>School Name</th><th>Address</th></tr>
    <tbody id='go'>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['name']; ?></td><td><?php echo $crow['address']; ?></td>
        
    <td><a href='edit_school.php?cmd=editsch&id=<?php echo $id;?>'> Edit </a> | <a href='delete_school.php?cmd=delsch&id=<?php echo $id;?>'> Delete </a></td>
    </tr>
  <?php } ?>
        
</tbody></table>
    
     