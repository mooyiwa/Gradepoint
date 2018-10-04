<?php
 
    /*$osql = "select overall from comments";
    $oresult = mysqli_query($cnx,$osql);
    $orow = mysqli_fetch_array($oresult);
    $overall = $orow['overall'];*/
    
            $percent = ($total/$obt)* 100;
            
            if ($percent >= 70 ){

                 echo 'Excellent performance. Keep it up!';
            }
            elseif($percent >= 60 && $percent <= 70 ){
 
                 echo 'Very Good performance.';
            }
            elseif ($percent >= 50 && $percent <= 60 ) {

                 echo 'Fairly Good performance. Can get better.';
            }
            elseif ($percent >= 39 && $percent <= 50 ) {
 
                 echo 'Fair performance. Buckle up!';
            }
            elseif ($percent <= 39 ) {

                 echo 'Poor performance. Need to improve.';
            }
