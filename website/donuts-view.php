<?php
// donuts-view.php //

include('config.php');

// remember the isset or get? //
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];

}else{
    header('Location:donuts.php');
}

$sql = "SELECT * FROM Donuts WHERE DonutId = $id";

// CONNECTING TO THE DATABASE //
$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

$sql = 'SELECT * FROM Donuts';

$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

//more than 0 rows? //

if(mysqli_num_rows($result) > 0 ) { // show the records //

while($row = mysqli_fetch_assoc($result)) {
$DonutName = stripslashes($row['DonutName']);
$DonutFlavour = stripslashes($row['DonutFlavour']);
$DonutDescription = stripslashes($row['DonutDescription']);

$Feedback = '';
} 

// }else {
//     $Feedback = 'Sorry';
// }
include('includes/header.php'); ?>
<h1><?=$DonutName?></h1>

<main>
    <h2>Welcome to <?php echo $DonutName;?>'s Page</h2>
    <?php if($Feedback == ''){
        echo '<ul>';
        echo '<li><b>Donut Name: </b> '.$DonutName.' </li>';
        echo '<li><b>Donut Flavour: </b> '.$DonutFlavour.' </li>';
        echo '<li><b>Donut Description: </b> '.$DonutDescription.' </li>';
        echo '</ul>';
        echo '<br>';
        echo '<p><a href="donuts.php">Go Back</a></p>';
    }else{
        echo $Feedback;
        
    } //end else//
}
    ?>
</main>
<aside>
    <?php
    if($Feedback == ''){
        echo '<img src="uploads/donut'.$id.'.jpg" alt="'.$DonutName.'">';
    } else {
        echo $Feedback;
    }
    // release the web server //
@mysqli_free_result($result);

// close connection //
@mysqli_close($iConn);
    ?>
</aside>