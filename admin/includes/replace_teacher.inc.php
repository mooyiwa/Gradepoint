<?php 

if(isset($_POST['submit']))
  {
     $class = $_POST['class'];
     $teacher = $_POST['teacher'];
     $year = $_POST['year'];
     
     //get old teacher
     $osql = "select classteacher from classes where class = '".$class."' and year = '".$year."' and school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' ";
     $oresult = mysqli_query($cnx, $osql);
     $orow = mysqli_fetch_array($oresult);
     $old_teacher = $orow['classteacher'];
       
     
 $que = "update classes set classteacher = '".$teacher."'
                               
                        where class = '".$class."'
                        and year = '".$_POST['year']."'
                        and classteacher = '".$old_teacher."'    
                        and  school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' ";
 
 $qresult = mysqli_query($cnx,$que);

 //Replace teacher in results
 $que2 = "update results set teacherID = '".$teacher."' where teacherID = '".$old_teacher."' and class = '".$class."' and year = '".$year."'";
 $qresult2 = mysqli_query($cnx,$que2);
 
  //Replace teacher in stds
 $que3 = "update students set teacherID = '".$teacher."' where teacherID = '".$old_teacher."' and level = '".$class."' and year = '".$year."'";
 $qresult3 = mysqli_query($cnx,$que3);
 
     if($qresult && $qresult2 && $qresult3){
     $msg = 'Teacher Replaced!';
     
  }else {echo mysqli_error($cnx);}

 }
 

  
  

