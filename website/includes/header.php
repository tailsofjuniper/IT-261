<!doctype html>
<html lang = "en">
<head>
<meta charset="UTF-8">
<title>
<?php echo $title; ?>
</title>
<link href = "css/styles-website.css" type="text/css" rel="stylesheet">
</head>
<body class="<?php echo $body; ?>">
<header>
    <div class="inner-header">
        <img id="logo" src="images/logo.png" alt="logo">
    <nav>
        <ul>
        <?php echo makeLinks($nav);?>
        </ul>
    </nav>
<div class="success">
    <?php
//notification //
if(isset($_SESSION['success'])) :?>
<h3>
    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    ?>
</h3>
<?php endif ?>
</div>
<br>
   

<div class="error success">
<!-- <div id="wrapper"> -->
<?php
    if(isset($_SESSION['UserName'])) : ?>
    <h3><?php echo $_SESSION['UserName']; ?></h3>
</div>
<br>

<div class="wrapper">
<a href="index.php?logout='1'">Logout</a>
<?php endif ?>
<br>
<a href='https://github.com/tailsofjuniper/IT-261'>GitHub</a>
</div>

</div> <!-- end inner-header-->

</header>