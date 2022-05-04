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
  <h2>Hawk's Fashion (Admin)</h2>

  <form method="POST" class="was-validated form-horizontal">
    <div class="row">
      <label class="control-label col-sm-2" for="username">Email:</label>

      <div class = "col">
	  <input type="email" class="form-control"
             placeholder="Enter a valid username" name="email" required>
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
    $query = 'SELECT * FROM admin WHERE password = :password AND emailAddress = :email';
    $statement = $db->prepare($query);
    $statement -> execute(array('password' => $_POST['pass'], 'email' => $_POST['email']));
    $count =   $statement -> rowCount();
    if ($count > 0) {
      header("location: Admin_Home_Page.php");
    }
    else {
      $message = '<label>Password or Username can be wrong</label>';

    }

  }
   ?>

	<p class="row">
		<p>Forgot Password? <a href = "password.php">Click here!</a><p>

	</p>

  <form action="Admin_register.php" class="form-horizontal">

	<p class="row">
		<p>registered your admin account</p>

		<label class="control-label col-sm-2"></label>
		<button type="submit" class="btn btn-success">Register</button>

	</form>
</div>
</body>
</html>
