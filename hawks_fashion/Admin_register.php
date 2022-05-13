<?php
include 'Functions/ezdubsdatabase.php';
include 'Functions/admin_db.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hawk's Fashion Admin Registration</title>
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
        background: lightslategray;
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
  <h2>Hawk's Fashion Admin Registration</h2>

  <form method="POST" class="was-validated form-horizontal">
    <div class="row">
      <label class="control-label col-sm-2" for="username">First name:</label>

      <div class = "col">
	  <input type="text" class="form-control" pattern ="[A-Za-z]{1,}$" placeholder="Enter first name" name="fname" required>
      <div class="valid-feedback">Valid</div>
      <div class="invalid-feedback">* No numbers for name</div>
    </div>
	</div>
  <div class="row">
    <label class="control-label col-sm-2" for="username">Last name:</label>

    <div class = "col">
  <input type="text" class="form-control"  pattern ="[A-Za-z]{1,}$" placeholder="Enter last name" name="lname" required>
    <div class="valid-feedback">Valid</div>
    <div class="invalid-feedback">* No numbers for name</div>
  </div>
</div>
    <div class="row">
      <label class="control-label col-sm-2" for="pwd">Password:</label>

      <div class="col">
	  <input type="password" class="form-control" id="pwd"
              placeholder="Enter password" name="pass" required>
      <div class="valid-feedback">Good.</div>
      <div class="invalid-feedback">* Please fill in this field</div>
    </div>
	</div>
	<div class="row">
      <label class="control-label col-sm-2" for="password_confirm">Password Confirm:</label>

      <div class="col">
	<input name="password_confirm" class="form-control" required="required" type="password" id="password_confirm"
	oninput="check(this)" />
	<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('pwd').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
	  <div class="valid-feedback">Password Matches</div>
      <div class="invalid-feedback">* Passwords must match.</div>
	</div></div>

	<div class="row">
      <label class="control-label col-sm-2" for="emailaddress">E-Mail:</label>

      <div class = "col">
	  <input type="email" class="form-control" id="emailaddress"
             pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
             placeholder="Enter valid E-Mail address" name="email" required>
      <div class="valid-feedback">Valid</div>
      <div class="invalid-feedback">* Use a valid E-Mail address</div>
    </div>
	</div>

		<label class="control-label"></label>
		<button type="submit" class="btn btn-success" name="submit">Complete Registration</button>
  </form>
  <?php if (isset($_POST['submit'])) {
    add_new_admin($_POST['email'], $_POST['pass'], $_POST['fname'], $_POST['lname']);
    header('location: admin_login.php');
  } ?>
</div>
</article>
</body>
</html>
