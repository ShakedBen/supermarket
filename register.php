<?php
include 'config.php';
if(isset($_POST["u_btn"]))
{
    $u_name=$_POST["u_name"];
    $u_lname=$_POST["u_lname"];
    $u_id=$_POST["u_id"];
    $u_email=$_POST["u_email"];
    $u_password=$_POST["u_password"];
    $u_cpassword=$_POST["u_cpassword"];
    $u_student=$_POST["u_student"];
     $u_gander=$_POST["u_gander"];
    
     $selectfdb=mysqli_query($conn,"SELECT * FROM users WHERE u_email='$u_email'" );
     $row=mysqli_fetch_array($selectfdb);
      if($row["u_email"]==$u_email)
      {
    echo "<h1><strong>The email is busy try one another</strong></h1>";
      }
      
      
     else if(empty($u_cpassword)||empty($u_password))
         {
             echo "Invalid password";
         }
     
     else if($u_password!=$u_cpassword)
     {
         echo "Password confirmation is invalid";
     }
      else if (strlen($u_password) < 8) 
          {
       echo  "Password too short!";
    }

    else if (!preg_match("#[0-9]+#", $u_password)) 
            {
         echo "Password must include at least one number!";
    }

    else if (!preg_match("#[a-zA-Z]+#", $u_password)) 
            {
         echo  "Password must include at least one letter!";
    }     
     else if(strlen($u_name)==0)
     {
        echo "invalid name";
     }
        else if(strlen($u_lname)==0)
     {
        echo "invalid last name";
     }
     else if(!preg_match("/^[a-zA-Z]/i", $u_name))
     {
         echo "<strong>invalid  name.</strong>";
         
         
     }
      else if(!preg_match("/^[a-zA-Z]/i", $u_lname))
     {
           echo "invalid last name";
         
     }
     else if(!preg_match("/^[0-9]/i",$u_id))
     {
             echo "invalid id";
     }
   else if(empty($u_name)||empty($u_lname)||empty($u_id)||empty($u_email)||empty($u_password)||empty($u_student)||empty($u_gander))
    {
        echo "please.. complete all data";
    }
    else{
    $insert= mysqli_query($conn, "INSERT INTO `users` (`u_name`, `u_lname`, `u_id`, `u_email`, `u_password`, `u_student`, `u_gander`) VALUES ('$u_name', '$u_lname', '$u_id', '$u_email', '$u_password', '$u_student', '$u_gander')");
     echo "<meta http-equiv='refresh' content='0; registerSuccee.php'>";
    }

}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sing in</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link rel="stylesheet" href="styles.css"/>
  <title>Super-Sami Online Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="style3.css">
  </head>
  <body>
<a href="login.php" class="navbar-brand" style="font-size:24px">Sign in</a>

<form name="reg" action="register.php" method="post" onsubmit="return Check_password(),Check_UserName(),Check_LastName()">
    
    
    
    
    <div class="login-box">
     <h1>Sing Up</h1>
       <div class="textbox">
    <i class="fas fa-user"></i>
<input type="text" name="u_name"  value="" placeholder="Name" required/>
</div>
	<div class="textbox">
    <input type="text" name="u_lname" placeholder="Last Name"  value="" required/>
        </div>
	<div class="textbox">
	<input type="id" name="u_id"  placeholder="ID Number" value="" required/>
        </div>
	
	<div class="textbox">
	<input type="email" name="u_email" value="" placeholder="Your Email" required/>
        </div>  
     
    <div class="textbox">
    <i class="fas fa-lock"></i>
	<td><input type="password" name="u_password" placeholder="Password" value="" required/>
	</div>
    <div class="textbox">
    <i class="fas fa-lock"></i>
<input type="password" name="u_cpassword" placeholder="Confirm Password" value="" required/>
    </div>
     <input type="submit" class="btn" name="u_btn" value="sign up">

        <label>Student</label>
        <input type="radio" name="u_student" value="on"/>
	<label>No Student</label>
        <input type="radio" name="u_student" placeholder="no student" value="off"/>
     <label><choose your gander:</label>
     	<select name="u_gander">
		<option value="female">female</option>
		<option value="male">male</option>
    </div>
   
</form>
     </body>
</html>