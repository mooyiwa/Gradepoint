<?php

  if(isset($_POST['submit'])){
      //post data
    //$prev_year = $_POST['prev_year'];
    $new_year = $_POST['new_year'];
    //$prev_class = $_POST['prev_class'];
    $new_class = $_POST['new_class'];
    $new_classteacher = $_POST['new_classteacher'];
    
foreach($_POST['checkbox'] as $checkbox){
   // echo $checkbox . ' ';
    $usql = "select username, fullname, sex from students where username = '".$checkbox."'";
    $uresult = mysqli_query($cnx,$usql);
    while($urow = mysqli_fetch_array($uresult)){
        
   // $user[] = $urow['username'];
    //$full[] = $urow['fullname'];
    //$sex[] = $urow['sex'];
    
    
       $nsql = "insert into students set username = '".$urow['username']."', 
                                           fullname = '".mysqli_real_escape_string($cnx,$urow['fullname'])."',
                                           sex      = '".$urow['sex']."',
                                           school   = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' ,
                                           year     = '".$new_year."',
                                           level    = '".$new_class."',    
                                           teacherID= '".$new_classteacher."'
           
               "; 
       
       $nresult = mysqli_query($cnx, $nsql);
              if($nresult){
           $msg = 'Class Promoted';
       } 
   
}
  }
   


  }


    
     