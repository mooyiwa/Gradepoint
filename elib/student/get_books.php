<?php
session_start();
include('../cnx.php');
// do query
if(isset($_GET['q'])){
   $suggest = $_GET['q'];
}
$sq ="select book_name from books where school = '".mysqli_real_escape_string($cnx,$_SESSION['school'])."' AND book_name LIKE '$suggest%' order by book_name";
$res = mysqli_query($cnx,$sq);
while($sqrow = mysqli_fetch_array($res)){
      echo $sqrow['book_name'],"\n";
}	 
?>	 