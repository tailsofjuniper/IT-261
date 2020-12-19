<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <fieldset>

<label>First Name</label>
<input type="text" name="firstName" value="<?php
if(isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName']);
?>"><span><?php echo $firstNameErr;?></span>

    <label>Last Name</label>
<input type="text" name="lastName" value="<?php
        if(isset($_POST['lastName'])) echo htmlspecialchars($_POST['lastName']);
        ?>">
        <span><?php echo $lastNameErr;?></span>

    <label>Email</label>
        <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);
        ?>">
        <span><?php echo $emailErr;?></span>

    <label>Telephone</label>
        <input type="tel" name="tel" placeholder="xxx-xxx-xxxx" value="<?php
        if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']);
        ?>">
        <span><?php echo $telErr;?></span>

<label>Gender </label>
<ul>
<li><input type="radio" name="gender" value="agender"
<?php if(isset($_POST['gender']) && $_POST['gender'] == 'agender') echo 'checked="checked"';
?>>Agender </li>

<li><input type="radio" name="gender" value="feminine"
<?php
if(isset($_POST['gender']) && $_POST['gender'] == 'feminine') echo 'checked="checked"';
?>
>Feminine </li>

<li><input type="radio" name="gender" value="masculine"
<?php
if(isset($_POST['gender']) && $_POST['gender'] == 'masculine') echo 'checked="checked"';
?>
>Masculine </li>

<li><input type="radio" name="gender" value="nonbinary"
<?php
if(isset($_POST['gender']) && $_POST['gender'] == 'nonbinary') echo 'checked="checked"';
?>
>Nonbinary </li>
<li><input type="radio" name="gender" value="trensgender"
<?php
if(isset($_POST['gender']) && $_POST['gender'] == 'transgender') echo 'checked="checked"';
?>
>Transgender </li>
<li><input type="radio" name="gender" value="decline"
<?php
if(isset($_POST['gender']) && $_POST['gender'] == 'decline') echo 'checked="checked"';
?>
>Prefer not to answer </li>
</ul>
<span><?php echo $genderErr;?></span>


<label>Peanut Butter</label>
<ul>
<li><input type="radio" name="pbutter" value="chunky"<?php if(isset($_POST['pbutter']) && $_POST['pbutter'] == 'chunky') echo 'checked="checked"';
?>>Chunky </li>

<li><input type="radio" name="pbutter" value="smooth"
<?php
if(isset($_POST['pbutter']) && $_POST['pbutter'] == 'smooth') echo 'checked="checked"';
?>>Smooth </li>

</ul>
<span><?php echo $pbutterErr;?></span>

<label>Favourite donuts </label>
<ul>
<li><input type="checkbox" name="donuts[]" value="red_donut"<?php
if(isset($_POST['donuts']) && $_POST['donuts'] == 'red_donut') echo 'checked="checked"';
?>>Red Donut</li>

<li><input type="checkbox" name="donuts[]" value="blue_donut"<?php
if(isset($_POST['donuts']) && $_POST['donuts'] == 'blue_donut') echo 'checked="checked"';
?>>Blue Donut</li>

<li><input type="checkbox" name="donuts[]" value="yellow_donut"<?php
if(isset($_POST['donuts']) && $_POST['donuts'] == 'yellow_donut') echo 'checked="checked"';
?>>Yello Donut</li>

<li><input type="checkbox" name="donuts[]" value="pink_donut"
<?php if(isset($_POST['donuts']) && $_POST['donuts'] == 'pink_donut') echo 'checked="checked"';
?>>Pink Donut</li>
</ul>
<span><?php echo $donutsErr;?></span>


<label>Comments</label>
<textarea name="comments"><?php if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $commentsErr; ?></span>

<input type="radio" name="privacy" value="accept"<?php
if(isset($_POST['privacy']) && $_POST['privacy'] == 'accept') echo 'checked="checked"';
?>
>Accept our privacy policy.
<span><?php echo $privacyErr;?></span>

<input type="submit" value="Send it!">
<p><a href="">Reset</a></p>
</fieldset>

</form>