<?php
//process

  if(isset($_POST['submit'])){

    $teacher = $_POST['teacher'];
   
//get teachers for managing 
$c = "select * from users where username ='$teacher' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by username";
  //$c = "select u.username,u.fullname,u.tsex,u.temail,u.tphone,u.taddress,cl.class from users u, classes cl where u.username = cl.classteacher AND u.username ='$teacher' //AND u.school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by u.username";
  $cresult = mysqli_query($cnx,$c);



?>
<table class="table responsive">
    <tr><th>Teacher ID</th><th>Full Name</th><th>Gender</th><th>Email</th><th>Phone</th></tr>
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    <tr class="bolder"><td><?php echo $crow['username']; ?></td><td><?php echo $crow['fullname']; ?></td><td><?php echo $crow['tsex']; ?></td>
        <td><?php echo $crow['temail']; ?></td><td><?php echo $crow['tphone']; ?></td>
        
        <td><a href='edit_staffer.php?cmd=editstf&id=<?php echo $id;?>'> Edit </a> | <a href='delete_staffer.php?cmd=delstf&id=<?php echo $id;?>'> Delete </a></td>
   
 </tr>
  <?php } ?>
        
</table>

<?php 


  }

?>
    
     