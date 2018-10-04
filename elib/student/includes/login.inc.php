<?php      
       
 //login handler
   if(isset($_POST['submit']))
    {  
       $sql="select username from elib_users where username='".$_POST['user']."' ";
       $result=mysqli_query($cnx,$sql) or die("Couldn't execute query");
       $num= mysqli_num_rows($result);
       if($num==1)// login OK
       {
         $sql="select * from elib_users where username = '".$_POST['user']."' AND password1 = md5('".$_POST['pass']."') AND password2 = md5('".$_POST['pass']."')";
         $result2 = mysqli_query($cnx,$sql) or die("Couldn't execute query 2.");
         $num2 = mysqli_num_rows($result2);
         $row = mysqli_fetch_array($result2);
         $who = $row['who'];
         $address = $row['address'];
         $org = $row['org'];
				
         if($num2 > 0)//password found
         {
          $_SESSION['auth']='yes';
          $logname = $_POST['user'];
          $_SESSION['logname']= $logname;
          $_SESSION['address']= $address;
          $_SESSION['org']= $org;
          $pass = $_POST['pass'];
          $_SESSION['pass']= @$pass;
       
           
										 

            header("Location: $who/index.php");

         }
         else //password is not correct
         {
          header("Location: index.php");
      
         }
        }
         elseif($num==0)// login name not found
         {
         header("Location: index.php");
       
         }
         break;
       }
