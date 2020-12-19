<?php 

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

    
    
<h1 class = "<?php echo $center; ?>"><?php echo $mainHeadline; ?></h1>
<?php

$photos[0] = 'blackdonut';
$photos[1] = 'yellowdonut';
$photos[2] = 'greendonut';
$photos[3] = 'reddonut';
$photos[4] = 'pinkdonut';
$photos[5] = 'bluedonut';
$photos[6] = 'whitedonut';

echo randImages($photos);

?>
<blockquote>
    Blahahahah ahblahclBlahahah ahahblahclBlahahahahahblahc lBlahahahahahblahcl BlahahahahahblahclBlah ahahahahblahc lBlahahahah ahblahclBlahahahahahblahclB lahahahahahblah clBlahahahahah blahclBlahahahahahblahclBlaha hahahahblahcl
</blockquote>
<?php include('includes/footer.php'); ?>