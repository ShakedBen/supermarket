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
  <title>Super-Sami Online Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body >


				<a href="#" class="navbar-brand">Super Sami</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a class="cart" style="font-size:24px" href=
                                                <?php
                                     if($arr['u_student']=='on')
                                    {
                                         echo "cart.php";
                                    }
                                    else  if($arr['u_student']=='off')
                                    {
                                       echo  "cart1.php";
                                    }
                                        
                                    ?>
                                                
                                                
                                                 >My Cart<span>0</span> <i class="fa fa-shopping-cart"></i></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                                    <li><a href=
                                    <?php
                    
                                    if($arr['u_student']=='on')
                                    {
                                          echo 'prod.php';
                                    }
                                    else
                                    {
                                        echo 'prod1.php';
                                    }
                                        
                                    ?>
				   > Products</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div>
		</div>


					<img src="_images/shopping-cart-plain-background-with-copy-space_23-2148288240.jpg" style="width:100%;">
		
	



  

  <!--Boostramp JS & jquery scripts-->
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>
<?php }?>