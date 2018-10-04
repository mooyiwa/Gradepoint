<?php 
// do edit
if(isset($_POST['submit']))
               {
                  $id = $_POST['id'];
                 $genre = $_POST['genre'];
                

                 $query = "update genres set genre = '".$genre."'

                                               where id='$id'";

                 $result = mysqli_query($cnx,$query);
                 

                if($result) {echo "RECORD UPDATED!","\n";}
                else echo"INVALID UPDATE!","\n";

                }



