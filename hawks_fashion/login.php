<?php
include 'Functions/ezdubsdatabase.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hawk's Fashion Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hawk's Fashion</h2>

  <form method="POST" class="was-validated form-horizontal">
    <div class="row">
      <label class="control-label col-sm-2" for="username">Username:</label>

      <div class = "col">
	  <input type="text" class="form-control" id="username"
             pattern ="[A-Za-z0-9]{2,}$"
             placeholder="Enter a valid username" name="user" required>
      <div class="valid-feedback">Valid</div>
      <div class="invalid-feedback">* Numbers and letters only</div>
    </div>
	</div>

    <div class="row">
      <label class="control-label col-sm-2" for="pwd">Password:</label>

      <div class="col">
	  <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="pass" required>
		<div class="valid-feedback">Good.</div>
		<div class="invalid-feedback">* Not a valid password</div>
	  </div>
	</div>

		<br><label class="control-label col-sm-2"></label>
		<button type="submit" name="submit" class="btn btn-info">Login</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $query = 'SELECT * FROM customer_info WHERE password = :password AND username = :username';
    $statement = $db->prepare($query);
    $statement -> execute(array('password' => $_POST['pass'], 'username' => $_POST['user']));
    $count =   $statement -> rowCount();
    if ($count > 0) {
      session_start();
      $_SESSION['id'] =  array();
      header("location: product_page.php");
    }
    else {
      $message = '<label>Password or Username can be wrong</label>';

    }

  }
   ?>

	<p class="row">
		<p>Forgot Password? <a href = "password.php">Click here!</a><p>

	</p>

  <form action="register.php" class="form-horizontal">

	<p class="row">
		<p>Not registered? Sign up below!</p>

		<label class="control-label col-sm-2"></label>
		<button type="submit" class="btn btn-success">Register</button>

	</form>
  <a href="admin_login.php">Are you an admin? click here.</a>
</div>
</body>
</html>
