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
    <title>Admin Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



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
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="Admin_Home_Page.php">Hawks Fashion</a>
      <?php
        include 'Logout.php';
      ?>
    </header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse ">
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
      $name = $_SESSION['find_user'];
       $productinfo = get_product($name);
        for ($i=0; $i < count($productinfo); $i++) {
          if (isset($productinfo[$i])) {
            switch ($productinfo[$i]) {
              case $productinfo[0];
                  $productID = $productinfo[0];
                  break;
              case $productinfo[1];
                  $productname = $productinfo[1];
                  break;
              case $productinfo[2];
                  $description = $productinfo[2];
                  break;
              case $productinfo[3];
                  $quantity = $productinfo[3];
                  break;
              case $productinfo[5];
                $img = $productinfo[5];
                break;
            }
          }
          else {
            continue;
          }

        }
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <h2>Edit Products</h2>
      <form method="post">
        <div class='form-group'>
          <label>ProductID</label>
          <input type='number' class='form-control' name='ID' value= <?php echo $productID;?> required readonly>
        </div>
        <div class='form-group'>
          <label>Product Name: <strong><?php echo $productname?></strong></label>
          <input type='text' class='form-control' name='name' placeholder="Enter New Product Name" required>
        </div>
        <div class='form-group'>
            <label>Description</label>
            <br>
            <textarea name="description" rows="8" cols="80" required><?php echo $description?></textarea>
        </div>
        <div class='form-group'>
            <label>Quantity</label>
            <input type='number' class='form-control' name='quantity' value= <?php echo $quantity;?> required>
        </div>
        <div class="form-group">
          <label>Price</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            <input class="form-control" name="price" type="number" min="1.00" step=".01" value=<?php echo $productinfo[4];?> required />
          </div>
        </div>
        <div class='form-group'>
            <label>Image</label>
            <input type="file" name="img" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="form">Submit</button>
      </form>
      <?php if (isset($_POST['ID'])) {
        $productID = $_POST['ID'];
        $productname = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $itemPrice = $_POST['price'];
        $image = $_POST['img'];
        edit_product($productID, $productname, $description, $itemPrice, $quantity, $image);
        header("location: Edit_products.php");
        session_destroy();
      }
      ?>
    </main>
  </div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
  <script>
    function onlyNumbers(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</html>
