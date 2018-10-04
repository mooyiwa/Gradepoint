<?php

  if(isset($_POST['submit'])){ 
//get students with pins
$c = "select users.username,users.fullname,users.pin,users.who, students.level from users join students ON students.username = users.username AND students.year = users.session WHERE users.who = 'student' AND students.level = '".$_POST['class']."' AND users.school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND users.session = '".$_POST['year']."' order by students.level";
$cresult = mysqli_query($cnx,$c); 
$ccount = mysqli_num_rows($cresult);
    
    ?>
<p style="padding-left: 15px">Total no of students: <?php echo $ccount; ?></p>
<table>
    <tr><th>Student ID</th><th>Full Name</th><th>PIN</th></tr>
    <tbody id="go">
    <?php
    while($crow = mysqli_fetch_array($cresult)){
      $id = $crow['id'];
      ?>
    <tr class="bolder"><td><?php echo $crow['username']; ?></td><td><?php echo $crow['fullname']; ?></td>
        <td><?php echo $crow['pin']; ?></td>
     
        
   
   </tr>
  <?php } }?>
    </tbody>        
</table>

    
     