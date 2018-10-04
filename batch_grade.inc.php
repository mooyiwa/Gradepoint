<?php

            //$total = $rrow['ca1'] + $rrow['exam1']; 
            
            if ($total >= 70 ){

                 echo 'A';
            }
            elseif($total >= 60 && $total <= 69 ){
 
                 echo 'B';
            }
            elseif ($total >= 50 && $total <= 59 ) {

                 echo 'C';
            }
            elseif ($total >= 40 && $total <= 49 ) {
 
                 echo 'P';
            }
            elseif ($total <= 39 ) {

                 echo 'F';
            }
