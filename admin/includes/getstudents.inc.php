<?php
//process

  if(isset($_POST['submit'])){

    $class = $_POST['class'];
   
//get students for managing 
$c = "select * from students where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND status != 'Closed' AND level ='$class' order by fullname";
$cresult = mysqli_query($cnx,$c);
$class_total = mysqli_num_rows($cresult);

?>
<table class="table responsive">
    <p style="position: relative;left:15px;font-size: 1.1em">Total no in class: <?php echo $class_total?></p>
    <tr><th>Student ID</th><th>Full Name</th><th>Gender</th><th>Phone</th></tr>
    <tbody id='go'>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    
    <tr class="bolder"><td><?php echo $crow['username']; ?></td><td><?php echo $crow['fullname']; ?></td><td><?php echo $crow['sex']; ?></td>
        <td><?php echo $crow['phone']; ?></td>
        
   
   <td><a href='edit_student.php?cmd=editstud&id=<?php echo $id;?>'> Edit </a> | <a href='delete_student.php?cmd=delstud&id=<?php echo $id;?>'> Delete </a></td>
    </tr>
  <?php } ?>
        
</tbody></table>

<?php }

?>
    
     