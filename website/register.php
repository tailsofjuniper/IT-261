<?php // register.php //
include('server.php');
include('includes/header.php');
?>

<h1>Registration</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<fieldset>
    <label>First Name</label>
    <input type="text" name="FirstName" value="<?php
if(isset($_POST['FirstName'])) echo $_POST['FirstName']  ?>">
<br>
<label>Last Name</label>
<input type="text" name="LastName" value="<?php
if(isset($_POST['LastName'])) echo $_POST['LastName']  ?>">
<br>
<label>Email</label>
<input type="text" name="Email" value="<?php
if(isset($_POST['Email'])) echo $_POST['Email']  ?>">
<br>
<label>User Name</label>
<input type="text" name="UserName" value="<?php
if(isset($_POST['UserName'])) echo $_POST['UserName']  ?>">
<br>
<label>Password</label>
<input type="password" name="Password_1" >
<br>

<label>Confirm Password</label>
<input type="password" name="Password_2" >
<br>

<button type="submit" class="btn" name="reg_user">REGISTER</button>
<br>
<button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">RESET</button>

<?php
include('includes/errors.php');
?>

</fieldset>
</form>
<p class="center">Already a member? <a href="login.php">Sign in!</a></p>
<br>
<?php include('includes/footer.php'); ?>