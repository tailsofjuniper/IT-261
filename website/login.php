<?php // login.php //
include('server.php');
include('includes/header.php');
?>

<h1>Login</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<fieldset>
    <label>UserName</label>
    <input type="text" name="UserName" value="<?php
if(isset($_POST['UserName'])) echo $_POST['UserName']  ?>">
<br>
<label>Password</label>
<input type="password" name="Password" >
<br>

<button type="submit" class="btn" name="login_user">Login</button>
<br>
<button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">RESET</button>
<?php
include('includes/errors.php');
?>
</fieldset>
</form>
<p class="center">Not registered yet? <a href="register.php">Sign up!</a></p>
<br>
<?php include('includes/footer.php'); ?>