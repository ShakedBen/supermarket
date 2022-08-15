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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Shopping Cart</title>
</head>
<body onload="displayCart()">
    <header>
        <div class="overlay"></div>
        <nav>
            <h2>SHOP</h2>
            <ul>
                 <li><a href="prod.php">Product</a></li>
                <li><a href="profile.php">Home</a></li>
                <li><a href="logout.php">logout</a></li>
                <li class="cart">
                    <a href="cart.php">
                        <ion-icon name="basket"></ion-icon>Cart<span>0</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container-products">
        <div class="product-header">
            <h5 class="product-title">PRODUCT</h5>
            <h5 class="price sm-hide">PRICE</h5>
            <h5 class="quantity">QUANTITY</h5>
            <h5 class="total">TOTAL</h5>
        </div>
        <div class="products">

        </div>
    </div>
<script src="script.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

</body>
</html>
<?php }?>
