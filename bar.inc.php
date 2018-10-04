<?php

            //$total = $allrow['ca2'] + $allrow['exam2']; 
            
            if ($total >= 70 ){ ?>
             <img src="../img/a.png" />
                
           <?php  }
            elseif($total >= 60 && $total <= 69 ){ ?>
 
                <img src="../img/b.png" />
            <?php }
            elseif ($total >= 50 && $total <= 59 ) { ?>

                 <img src="../img/c.png" />
           <?php }
            elseif ($total >= 40 && $total <= 49 ) { ?>
 
                <img src="../img/p.png" />
           <?php }
            elseif ($total <= 39 ) { ?>

                 <img src="../img/f.png" />
           <?php } 