<?php 
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$sql ="select who from users where username = '".$_SESSION['logname']."'";
$result = mysqli_query($cnx,$sql);
$row = mysqli_fetch_array($result);
$whothis = $row['who'];
if($whothis != 'admin1'){
    header('Location: ./../index.php');
}
?>
       
        
              <ul>
         
         <p class="acctname"><img src="../img/avatar.jpg" /> <?php echo $_SESSION['logname']; ?> <br /> <?php echo $_SESSION['who']; ?> | <a href='../logout.php?logout=1'>Log out</a></p>    

         <li <?php if ($currentPage =='create_school.php') {echo 'id="here"';} ?>><a href="create_school.php">Create School </a></li>
         <li <?php if ($currentPage =='create_admin.php') {echo 'id="here"';} ?>><a href="create_admin.php">Create Admin(s) </a></li>
         
        
             
         <li <?php if ($currentPage =='all_schools.php') {echo 'id="here"';} ?>><a href="all_schools.php">All Schools</a></li>
         
          <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'editsch'){
             ?>
             <li <?php if ($currentPage =='edit_school.php') {echo 'id="here"';} ?>><a href="#">Edit School </a></li>
             
             <?php } } ?>
             
            <?php if(isset($_GET['cmd'])){
             
                 if( $_GET['cmd'] == 'delsch'){
             ?>
             <li <?php if ($currentPage =='delete_school.php') {echo 'id="here"';} ?>><a href="#">Delete School </a></li>
             
             <?php } } ?>        
             
         <li <?php if ($currentPage =='super_resetpassword.php') {echo 'id="here"';} ?>><a href="super_resetpassword.php">Reset Passwords</a></li>
        
         </ul>
         <p class="nom" style="position: relative;left:10px;"><?php echo stripslashes($_SESSION['school']); ?></p>



