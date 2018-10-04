<?php 
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$sql ="select who from users where username = '".$_SESSION['logname']."'";
$result = mysqli_query($cnx,$sql);
$row = mysqli_fetch_array($result);
$whothis = $row['who'];
if($whothis != 'admin'){
    header('Location: ./../index.php');
}
?>
       
        
         <ul>
         
         <p class="acctname"><img src="../img/avatar.jpg" /> <?php echo $_SESSION['logname']; ?> <br /> <?php echo $_SESSION['who']; ?> | <a href='../logout.php?logout=1'>Log out</a></p>    
        
         
         <li <?php if ($currentPage =='pins.php') {echo 'id="here"';} ?>><a href="pins.php">View PINs </a></li>
         <li <?php if ($currentPage =='edit_id.php') {echo 'id="here"';} ?>><a href="edit_id.php">Change StudentID </a></li> 

         <li <?php if ($currentPage =='create_session.php') {echo 'id="here"';} ?>><a href="create_session.php">Create Session </a></li>
       
      
         <li <?php if ($currentPage =='staff_reg.php') {echo 'id="here"';} ?>><a href="staff_reg.php">Create User / Teacher </a></li>
         <li <?php if ($currentPage =='create_classes.php') {echo 'id="here"';} ?>><a href="create_classes.php">Create Classes </a></li>
         <li <?php if ($currentPage =='add_teacher.php') {echo 'id="here"';} ?>><a href="add_teacher.php">Assign Class to Teacher </a></li> 
                  <li <?php if ($currentPage =='assign_student.php') {echo 'id="here"';} ?>><a href="assign_student.php">Re-Assign Student </a></li> 
                  <li <?php if ($currentPage =='replace_teacher.php') {echo 'id="here"';} ?>><a href="replace_teacher.php">Replace Class Teacher </a></li>             
         <li <?php if ($currentPage =='create_subjects.php') {echo 'id="here"';} ?>><a href="create_subjects.php">Create Subjects </a></li>
         <li <?php if ($currentPage =='all_classes.php') {echo 'id="here"';} ?>><a href="all_classes.php">All Classes </a></li>
                   <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'editclass'){
             ?>
             <li <?php if ($currentPage =='edit_class.php') {echo 'id="here"';} ?>><a href="#">Edit Class </a></li>
             
             <?php } } ?>
         <li <?php if ($currentPage =='subjects.php') {echo 'id="here"';} ?>><a href="subjects.php">All Subjects </a></li>
         
           <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'editsub'){
             ?>
             <li <?php if ($currentPage =='edit_subject.php') {echo 'id="here"';} ?>><a href="#">Edit Subject </a></li>
             
             <?php } } ?>
             
            <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'delsub'){
             ?>
             <li <?php if ($currentPage =='delete_subject.php') {echo 'id="here"';} ?>><a href="#">Delete Subject </a></li>
             
             <?php } } ?>
             
               <li <?php if ($currentPage =='all_sessions.php') {echo 'id="here"';} ?>><a href="all_sessions.php">All Sessions </a></li>

         <li <?php if ($currentPage =='staff.php') {echo 'id="here"';} ?>><a href="staff.php">All Users / Teachers </a></li>
         
           <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'editstf'){
             ?>
             <li <?php if ($currentPage =='edit_staffer.php') {echo 'id="here"';} ?>><a href="#">Edit User </a></li>
             
             <?php } } ?>
             
           <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'delstf'){
             ?>
             <li <?php if ($currentPage =='delete_staffer.php') {echo 'id="here"';} ?>><a href="#">Delete User </a></li>
             
             <?php } } ?>
             
         <li <?php if ($currentPage =='students.php') {echo 'id="here"';} ?>><a href="students.php">All Students </a></li>
         
         <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'editstud'){
             ?>
             <li <?php if ($currentPage =='edit_student.php') {echo 'id="here"';} ?>><a href="#">Edit Student </a></li>
             
             <?php } } ?>
             
         <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'delstud'){
             ?>
             <li <?php if ($currentPage =='delete_student.php') {echo 'id="here"';} ?>><a href="#">Delete Student </a></li>
             
             <?php } } ?>
         
             
             <li <?php if ($currentPage =='stats.php') {echo 'id="here"';} ?>><a href="stats.php">Stats </a></li> 
             <li <?php if ($currentPage =='close_school.php') {echo 'id="here"';} ?>><a href="close_school.php">Close School Year </a></li>         
           <li <?php if ($currentPage =='promote.php') {echo 'id="here"';} ?>><a href="promote.php">Promote Students </a></li>
           <li <?php if ($currentPage =='create_assessment.php') {echo 'id="here"';} ?>><a href="create_assessment.php">Create Assessment Types </a></li>
           <li <?php if ($currentPage =='create_assessment_items.php') {echo 'id="here"';} ?>><a href="create_assessment_items.php">Create Assessment Items </a></li>          
           <li <?php if ($currentPage =='trace_records.php') {echo 'id="here"';} ?>><a href="trace_records.php">Trace Records </a></li>
           <li <?php if ($currentPage =='reset_pass.php') {echo 'id="here"';} ?>><a href="reset_pass.php">Change Password</a></li>
         
     
         </ul>
         <p class="nom" style="position: relative;left:10px;"><?php echo $_SESSION['school']; ?></p>



