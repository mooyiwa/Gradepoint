<?php
//get sessions for managing 
$c = "select * from sessions where school = '".$_SESSION['school']."' order by session";
$cresult = mysqli_query($cnx,$c);

?>
<table class="table">
    <tr><th>Session</th><th>Status</th></tr>
    <tbody id='go'>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['session']; ?></td><td><?php echo $crow['status']; ?></td>
        
    <td><a href='edit_session.php?cmd=edit&id=<?php echo $id;?>'> Edit </a></tr>
  <?php } ?>
        
</tbody></table>
    
     