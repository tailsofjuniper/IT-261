<?php //donuts.php //

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
    <p><?php echo $_GET['DonutName']; ?></p>
    
<main>
    <h1><?php echo $mainHeadline; ?></h1>           
    <?php
$sql = 'SELECT * FROM Donuts';

$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

//more than 0 rows? //

if(mysqli_num_rows($result) > 0 ) { // show the records //

while($row = mysqli_fetch_assoc($result)) {
    // this array display contents. //

echo '<ul>';
echo '<li class="bold">For more information <a href="donuts-view.php?id='.$row['DonutId'].' ">'.$row['DonutName'].' </a></li>';
echo '<li>'.$row['DonutFlavour'].'</li>';
echo '<li>'.$row['DonutDescription'].'</li>';

echo '</ul>';
} // close while //
} // close if //
else{ // what if there are no people? //
echo 'Go away';
} // close else //

// release the web server //
@mysqli_free_result($result);

// close connection //
@mysqli_close($iConn);
?>
</main>
<aside>
    <h3>This is my aside</h3>

</aside>

<?php include('includes/footer.php'); ?>