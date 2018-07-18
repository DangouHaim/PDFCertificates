<?
if(isset($_POST["Login"]) && isset($_POST["Password"]))
{
	$hash = MD5("admin");
	//"d41d8cd98f00b204e9800998ecf8427e"
	//echo $hash."<br>";
	//echo $_POST["Password"];
	if($_POST["Login"] == "admin" && $_POST["Password"] === $hash)
	{
		setcookie("AUTH", MD5($_POST["Login"]) . $_POST["Password"]);
		setcookie("ERR","",-3600);
		header('Location: index.php');
		die;
	}
	else {
		setcookie("ERR","Неверный логин или пароль");
		header('Location: auth.php');
		die;
	}
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery-md5.js"></script>
	<script type="text/javascript">

		//var md5 = ;
		//Create (hex-encoded) HMAC-MD5 hash of a given string value and key:

		//var md5 = $.md5('value', 'key');
		//Create raw MD5 hash of a given string value:

		//var md5 = $.md5('value', null, true);
		//Create raw HMAC-MD5 hash of a given string value and key:

		//var md5 = $.md5('value', 'key', true);

		$( document ).ready(function() {
	        $("#form").submit(function()
	        {
	        	$("#Password").val($.md5($("#Password").val()));
	        });
	    });

	</script>
	<title></title>
</head>
<body>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<form id="form" action="auth.php" method="post">
			  		<label for="Login">Login</label>
			    	<input name="Login" required type="text" class="form-control" id="Login">

			  		<label for="Login">Password</label>
			    	<input name="Password" required type="Password" class="form-control" id="Password">
					<br>
					<input class="btn btn-primary btn-block" type="submit" value="Login">
				</form>
				<h4 style="color: red; text-align: center;"><?php echo $_COOKIE["ERR"]; ?></h4>
			</div>
		</div>
	</div>
</section>

</body>
</html>