<?
if(isset($_POST["Login"]) && isset($_POST["Password"])))
{
	setcookie("AUTH", "true");
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="auth.php" method="post">
		<label>Login</label>
		<input type="text" name="Login">
		<label>Password</label>
		<input type="Password" name="Password">
		<input type="submit" value="Login">
	</form>
</body>
</html>