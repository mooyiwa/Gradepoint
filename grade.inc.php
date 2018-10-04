<?php

            $total = $CA[$m] + $exam[$m]; 
            
            if ($total >= 70 ){

                 echo 'A _ Excellent';
            }
            elseif($total >= 60 && $total <= 69 ){
 
                 echo 'B _ Very Good';
            }
            elseif ($total >= 50 && $total <= 59 ) {

                 echo 'C _ Credit';
            }
            elseif ($total >= 40 && $total <= 49 ) {
 
                 echo 'P _ Fair';
            }
            elseif ($total <= 39 ) {

                 echo 'F _ Failed';
            }
