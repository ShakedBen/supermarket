<?php
include 'config.php';

if($login==1)
{
     echo "<meta http-equiv='refresh' content='0; url=profile.php'>";
}
else{
    

if(isset($_POST["u_btn"]))
{
    $u_email=$_POST['u_email'];
    $u_password=$_POST['u_password'];
    if(empty($u_email)||empty($u_password))
    {
        echo "please complet all data";
    }
    else {
    $selectfdb=mysqli_query($conn,"SELECT * FROM users WHERE u_email='$u_email' AND u_password='$u_password'" );
    $row=mysqli_fetch_array($selectfdb);
    if($row["u_email"]==$u_email && $row["u_password"]==$u_password)
    {
        setcookie('uid',$row["u_id"],time()+(3600*24));
        setcookie('login',1,time()+(3600*24));
        
        echo "<meta http-equiv='refresh' content='0; url=profile.php'>";
    }
    else{
        echo "Email or password incorrect";
    }
    }
}



?>



<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="style3.css">
  </head>
  <body>
<form action="login.php" method="post">
<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="email" placeholder="Username" name="u_email" value="">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="u_password" value="">
  </div>

  <input type="submit" class="btn" value="sign in" name="u_btn">
  <h3>New? click here</h3><a href="register.php" class="navbar-brand" style="font-size:24px">Sing up</a>
  </form>
</div>
  </body>
</html>

<?php }?>