```<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hawk's Fashion Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      html {
        font-family: sans-serif;
      }
      body {
        margin: 0;
      }
      header {
        background: darkred;
        height: 150px;
      }
	  p {
        text-align: center;
        color: white;
        margin: 0;
      }
      h1 {
        text-align: center;
        color: white;
        line-height: 50px;
        margin: 0;
      }
	  h3 {
        text-align: center;
        color: white;
        margin: 0;
      }
	  img:hover {
		height: 325px;
		width: 325px;
		z-index:1;
	  }
      article {
        padding: 10px;
        margin: 10px;
        background: darkred;
      }
	  section {
		  display: flex;
		  flex-flow: row wrap;
		  flex: 200px;
		  align-items: center;
		  justify-content: space-around;
		  background: crimson;
	  }
	  .flex-box-2 {
		  display:flex;
		  justify-content: flex-end;
		  padding: 10px;
	  }
    </style>
  </head>
  <header>
	  <div class="flex-box-2">
		<form action="login.php">
			<input class = "btn btn-light" type="submit" value="Login"/>
		</form>
		&nbsp &nbsp
		<form action="register.php">
			<input class = "btn btn-light" type="submit" value="Register"/>
		</form>
	</div>
      <h1>Welcome to Hawk's Fashion<h1>
	  <h3>Come check out some of our newest and most fashionable apparel on campus</h3>
    </header>
  <body>
    <section>
      <article>
		<img src = "img/rocky.jpg" width = "292px" height = "275px" href = "home.php">
        <p><b>Help our friend Rocky</b></p>
      </article>

      <article>
		<img src = "img/montclairsweatshirt.png" width = "292px" height = "275px" href = "home.php">
        <p><b>Many different clothing options</b></p>
      </article>

      <article>
		<img src = "img/montclairpants.png" width = "292px" height = "275px" href = "home.php">
        <p><b>Low Prices</b></p>
      </article>
    </section>
  </body>
</html>
```
