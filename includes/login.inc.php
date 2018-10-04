<?php            
 //login handler
   if(isset($_POST['submit']))
    {  
         $sql = "select username from users where username = '".mysqli_real_escape_string($cnx,$_POST['user'])."'";
       $result = mysqli_query($cnx,$sql) or die(mysqli_error($cnx));
       $num = mysqli_num_rows($result);
       if($num == 1)// login OK
       {
         $sql = "select * from users where username = '".mysqli_real_escape_string($cnx,$_POST['user'])."' AND password = md5('".$_POST['pass']."')";
         $result2 = mysqli_query($cnx,$sql) or die("Couldn't execute query 2.");
         $num2 = mysqli_num_rows($result2);
         $row = mysqli_fetch_array($result2);
         $who = $row['who'];
         $school = $row['school'];
         $bank = $row['bank'];
				
         if($num2 > 0)//password found
         {
          $_SESSION['auth']='yes';
          $logname = $_POST['user'];
          $_SESSION['logname']= $logname;
          $_SESSION['school']= $school;
          $_SESSION['who']= $who;
          $_SESSION['bank']= $bank;
          $pass = $_POST['pass'];
          $_SESSION['pass']= @$pass;
       
           
										 

            header("Location: $who/index.php");

         }
      else //password is not correct
         {
          //header("Location: index.php");
         unset($_POST['submit']);
         $err = "Username exists, but password is incorrect!";
        // echo "<p class='err'>",$err,"</p>";

         }
        }
         elseif($num==0)// login name not found
         {
        // header("Location: index.php");
         unset($_POST['submit']);
         $err = "The Username entered does not exist!" ;
         //echo "<p class='err'>",$err,"</p>";
         }
       }
