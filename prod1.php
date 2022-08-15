<?php
include'config.php';
if($login==0)
{
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}else{
    $u_id=$_COOKIE['uid'];
    $getinfo= mysqli_query($conn, "SELECT * FROM users WHERE u_id=$u_id");
    $arr= mysqli_fetch_array($getinfo);
   
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link rel="stylesheet" href="styles.css"/>
<meta charset="utf-8">
<title>Product page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="script1.js"></script>
</head>


<body onLoad="init()">
    <a href="profile.php" class="navbar-brand" href="profile.php">Super Sami</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-nav-demo">
    <ul class="nav navbar-nav">
        <li><a href="logout.php">Log out</a></li>
					<li><a  href="cart1.php" class="cart" style="font-size:24px">Cart <span>0</span> <i class="fa fa-shopping-cart"></i></a></li>
        
<form action="cart1.php" method='GET'>
<div class="all_site">
<h1>Drink store </h1>
	<div class="prods" id="prods" >
	
	</div>

</div>
</form>
</body>
</html>


<?php }?>