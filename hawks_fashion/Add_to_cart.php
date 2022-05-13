<?php
session_start();
include 'Functions/ezdubsdatabase.php';
include 'Functions/products_db.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
        <div class="container-fluid">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill text-light" viewBox="0 0 16 16">
            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
          </svg>
          <a class="navbar-brand" href="product_page.php">&nbsp Hawk Fashion &nbsp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="product_page.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart_view2.php">&nbsp Cart</a>
              </li>
            </ul>
            <?php include 'Logout.php' ?>
          </div>
        </div>
      </nav>
    </header>
    <?php
    $product = $_POST['id'];
     $product = get_product($product);
    ?>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <img src="img/<?php echo $product['img'];?>">
            </div>
          </div>
          <form class="" action="cart_view.php" method="post">
            <h2><?php echo $product['productName']; ?></h2>
            <div class='form-group'>
                <label>Quantity</label>
                <input type='number' class='form-control' name='quantity' min = '1' max=<?php echo $product['quantity'];?> required>
            </div>
            <div class='form-group'>
                <p>Description:</p>
                <p><?php echo $product['description'];?> </p>
            </div>
            <div class='form-group'>
                <p>Price:</p>
                <p><?php echo $product['itemPrice'];?> </p>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="form" value=<?php echo $product['productID']?>>Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
