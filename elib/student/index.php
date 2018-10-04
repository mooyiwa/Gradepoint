<?php
session_start();
include('../cnx.php');

//hijack fix && session mgt
       include('../includes/hijack_sess.inc.php'); 

      //Get categories for Category widg
       $query = "select category from categories where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' order by category";
       $ans =  mysqli_query($cnx,$query);
       while($row = mysqli_fetch_array($ans)){
       $cats[] = $row['category'];}
       
      
?>
<!DOCTYPE html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="../css/1200.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
<link rel="stylesheet" href="../css/input.css" type="text/css" />


  <script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="../js/listscript.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
  <script type="text/javascript" src="../js/autocscript.js"></script>
  <script type="text/javascript" src="../js/paginator.js"></script>
      

</head>
<body>

<div class="container">
	<div class="grid_6 alpha"></div>
        <div class="grid_4"></div>
        <div class="grid_2 logo">  
        </div>
             
        <div class="grid_2 alpha">
          <img src="../img/logo.png" />
            
        </div>
        <div class="grid_7 padd">
                <form action="" method="post" class="search">
         <input type="text" name="search" id="search" placeholder="Enter a book title" class="searchbox" value="<?php echo $_POST['search']; ?>" />
         <button type="submit" name="submit" class="bigsearch">Search</button>
         </form>
            
          
        </div>
        
        
        
        <div class="grid_3 blank"></div>

        <div class="grid_2 alpha bookshelf">
                     <!--<p class="acctname"><img src="../img/avatar.jpg" /> <?php //echo $_SESSION['logname']; ?> | <?php //echo $_SESSION['who']; ?> | <a href='../logout.php?logout=1'>Log out</a></p>-->
            <h2 class="padr">Bookshelf</h2>
          <ul class='cates'>
             <?php foreach($cats as $cat){ ?>
                  
                      <li><a href="index.php?cate=<?php echo $cat; ?>"> <?php echo $cat; ?> </a></li>
                <?php  } ?>
              
          </ul>
        </div>
        
            <?php include('includes/book.inc.php'); ?>
        

 
</div><!--class="container" -->


<script type='text/javascript'>
$(document).ready(function() {
$('table tr:odd').css('background-color','#fff');
});
</script>

<script type='text/javascript'>
$(document).ready(function() {
$('tbody#go').pagination();

 });
</script>

<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function(){
$('#iframe').contents().find('#presentation').remove();
    }, 100);
 });
</script>

<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function(){
$('#iframe').contents().find('#about').remove();
    }, 100);
 });
</script>
</body>
</html>
