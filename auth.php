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
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
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
	<form id="form" action="auth.php" method="post">
		<label>Login</label>
		<input id="Login" type="text" name="Login">
		<label>Password</label>
		<input id="Password" type="Password" name="Password">
		<input type="submit" value="Login">
	</form>
</body>
</html>