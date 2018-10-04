<?php
//get banks for managing 
$c = "select * from banks order by bank";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table">
    <tr><th>Bank</th></tr>
    <tbody id='go'>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['bank']; ?></td>
        
    <td><a href='edit_bank.php?cmd=editbank&id=<?php echo $id;?>'> Edit </a> | <a href='delete_bank.php?cmd=delbank&id=<?php echo $id;?>'> Delete </a></td>
    </tr>
  <?php } ?>
        
</tbody></table>
    
     