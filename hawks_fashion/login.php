<?php
include 'Functions/ezdubsdatabase.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hawk's Fashion User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      html {
        font-family: sans-serif;
      }
      body {
        margin: 0;
      }
      header {
        background: gray;
        height: 150px;
      }

      h2 {
        text-align: center;
        color: white;
        line-height: 50px;
        margin: 0;
      }
	  a {
        color: darkslateblue;
        line-height: 50px;
        margin: 0;
      }
	  label {
        color: white;
      }
	  p {
        color: white;
      }
	  img:hover {
		height: 325px;
		width: 325px;
		z-index:1;
	  }
      article {
        padding: 10px;
        margin: 10px;
        background: lightslategray;
      }
    </style>
</head>
<body>
<article>
<div class="container">
  <h2>Hawk's Fashion User Login</h2>
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

  <form action="register.php" class="form-horizontal">

	<p class="control-label col-sm-2">
		<p>Not registered? Sign up below!</p>

		<label class="control-label col-sm-2"></label>
		<button type="submit" class="btn btn-success">Register</button>

	</form>
	<br>
  <p>Are you an admin? <b><a href="admin_login.php">Click here!</a></b></p>
</div>
</article>
</body>
</html>