<?php //daily.php //
session_start();

if(!isset($_SESSION['UserName'])){
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}

include('config.php');
include('includes/header.php'); ?>


<div id="wrapper">
<main>
            <h1><?php echo $mainHeadline; ?></h1>

 <?php
date_default_timezone_set('America/Los_Angeles');
if(isset($_GET['today'])) {
    $today = $_GET['today'];
} else {
    $today = date('l');
}

switch($today){
    case 'Sunday';
    $donut = 'Sunday is Red Donut Day!';
    $pic = 'reddonut.jpg';
    $alt = 'red donut';
    $content = 'Red Donut Sunday gets the week rolling.';
    $color = 'red';
    break;
    case 'Monday';
    $donut = 'Monday is Blue Donut Day!';
    $pic = 'bluedonut.jpg';
    $alt = 'blue donut';
    $content = 'Blue donut Monday is world-renowned.';
    $color = 'blue';
    break;
    case 'Tuesday';
    $donut = 'Tuesday is Green Donut Day!';
    $pic = 'greendonut.jpg';
    $alt = 'green donut';
    $content = 'Make a wish on Green donut Tuesday!';
    $color = 'green';
    break;
    case 'Wednesday';
    $donut = 'Wednesday is Pink Donut Day!';
    $pic = 'pinkdonut.jpg';
    $alt = 'pink donut';
    $content = 'Pink Donut Wednesday is the pinkest, most Wednesday Donut Day ever.';
    $color = 'pink';
    break;
    case 'Thursday';
    $donut = 'Thursday is Yellow Donut Day!';
    $pic = 'yellowdonut.jpg';
    $alt = 'yellow donut';
    $content = 'Yellow Donut Thursday is spent wondering what flavour yellow is.';
    $color = 'yellow';
    break;
    case 'Friday';
    $donut = 'Friday is Black Donut Day!';
    $pic = 'blackdonut.jpg';
    $alt = 'black donut';
    $content = 'The mysterious Black Donut awaits you on Black Fridays!';
    $color = 'black';
    break;
    case 'Saturday';
    $donut = 'Saturday is White Donut Day!';
    $pic = 'whitedonut.jpg';
    $alt = 'white donut';
    $content = 'White Donut Saturday is ok I guess.';
    $color = 'white';
    break;
}

?>

<div class="wrapper">
    <main class = "<?php echo $color; ?>">
        <h1><?php echo $donut; ?></h1>
        <p><?php echo $content; ?></p>
        <img src="images/<?php echo $pic; ?>" alt="<?php echo $alt; ?>">
    </main>
    <aside>
        <h4>Click below to view the daily donuts.</h4>
        <ul>
        <li><a href="daily.php?today=Sunday">Sunday</a></li>
        <li><a href="daily.php?today=Monday">Monday</a></li>
        <li><a href="daily.php?today=Tuesday">Tuesday</a></li>
        <li><a href="daily.php?today=Wednesday">Wednesday</a></li>
        <li><a href="daily.php?today=Thursday">Thursday</a></li>
        <li><a href="daily.php?today=Friday">Friday</a></li>
        <li><a href="daily.php?today=Saturday">Saturday</a></li>
        </ul>
    </aside>
</div>
<!-- end wrapper -->

<?php include('includes/footer.php'); ?>