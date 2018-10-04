<?php
             if(isset($_GET['cate'])){
                 $cate = $_GET['cate'];
                     
        $sql = "select * from books where category = '".$cate."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
        $ress = mysqli_query($cnx,$sql);
             while($rrow = mysqli_fetch_array($ress)){
                    $book[] = $rrow['book_name'];
                   
                    $author[] = $rrow['author_name'];
             }         
                    
    ?>  

<div class="grid_7">
    <p class="msg"><?php echo $cate; ?></p>
<table class="table view booklist">
    <tr><th>Book Name</th><th>Author Name</th></tr>
    <tbody id="go">
    <?php        for($z=0;$z<count($book);$z++) { ?>
            <tr>
                <td><a href="index.php?q=<?php echo $book[$z]; ?>"><?php echo $book[$z]; ?></a></td>
                <td><?php echo $author[$z]; ?></td>
                
            
            </tr>
      <?php  }
     ?> 
    </tbody>
</table>
    </div>
      <?php    } 
      
      
             elseif(isset($_GET['q'])){
                 $book = $_GET['q'];
                     
        $sql = "select * from books where book_name = '".$book."' AND school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."'";
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
      <?php    } ?>
      



             
             
                    
                   

 
   
