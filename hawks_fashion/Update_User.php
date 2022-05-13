<?php
session_start();
include 'Functions/ezdubsdatabase.php';
include 'Functions/customer_db.php';
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
       $userinfo = get_customer($name);
        for ($i=0; $i < count($userinfo); $i++) {
          if (isset($userinfo[$i])) {
            switch ($userinfo[$i]) {
              case $userinfo[0];
                  $customerID = $userinfo[0];
                  break;
              case $userinfo[1];
                  $firstname = $userinfo[1];
                  break;
              case $userinfo[2];
                  $lastname = $userinfo[2];
                  break;
              case $userinfo[3];
                  $email = $userinfo[3];
                  break;
              case $userinfo[4];
                  $Username = $userinfo[4];
                  break;
              case $userinfo[5];
                  $password = $userinfo[5];
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
      <h2>Edit User's Account</h2>
      <form method="post">
        <div class='form-group'>
          <label>CustomerID</label>
          <input type='number' class='form-control' name='ID' value= <?php echo $customerID;?> required readonly>
        </div>
        <div class='form-group'>
          <label>First Name</label>
          <input type='text' class='form-control' name='Fname' value= <?php echo $firstname;?> required>
        </div>
        <div class='form-group'>
            <label>Last Name</label>
            <input type='text' class='form-control' name='Lname' value= <?php echo $lastname;?> required>
        </div>
        <div class='form-group'>
            <label>Email</label>
            <input type='email' class='form-control' name='email' value= <?php echo $email;?> required>
        </div>
        <div class='form-group'>
          <label>User name</label>
          <input type='text' class='form-control' name='Username' value= <?php echo $Username;?> required readonly>
        </div>
        <div class='form-group'>
          <label>Password</label>
          <input type='text' class='form-control' name='Pass' value= <?php echo $password;?> required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="form">Submit</button>
      </form>
      <?php if (isset($_POST['form'])) {
        $customerID = $_POST['ID'];
        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $email = $_POST['email'];
        $pass = $_POST['Pass'];
        edit_customer($customerID, $firstname, $lastname, $email, $pass);
        header("location: Edit_Accounts.php");
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
