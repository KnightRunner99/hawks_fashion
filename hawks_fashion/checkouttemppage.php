<html>
<head>
  <meta charset="utf-8">
  <title>Login Confirmation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <?php
  session_start();
  session_destroy();?>
  <h1>Thank you for your order! Your order subtotal came out to be $<?php echo $_POST["checkout"];?></h1>
  <h2>This page is currently under construction.</h2>

  <form method="post" action="product_page.php">
  <button type = "submit" class="btn btn-primary" name="checkout">Return to Shop</button>
  </form>

</body>
</html>
