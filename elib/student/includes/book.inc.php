<?php
             if(isset($_POST['submit'])){
                 $suggest = $_POST['search'];
                 
                 //$suggest = str_ireplace('%27', ' ', $suggest);
                     
        $sql = "select * from books where book_name = '".$suggest."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
        $ress = mysqli_query($cnx,$sql);
        $rrow = mysqli_fetch_array($ress);
                    $book_name = $rrow['book_name'];
                    $pdf_id = $rrow['pdf_id'];
                    $author_name = $rrow['author_name'];
                    $desc = $rrow['desc'];
                    
    ?>  
    <div class="grid_7">
        <iframe id='iframe' src = "ViewerJS/#../pdfs/<?php echo $pdf_id; ?>" width='670' height='650' allowfullscreen webkitallowfullscreen></iframe>
   
    </div> 

        <div class="grid_3">
            <h2>Author(s)</h2>
            <p><?php echo $author_name; ?></p>
            
            <h2>Short Description</h2>
            <p><?php echo $desc; ?></p>
            
          
        </div>
      <?php    }
      else{
          include('includes/booklist.inc.php'); 
      }
      ?>



             
             
                    
                   

 
   
