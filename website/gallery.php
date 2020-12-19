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

<div id="wrapper">
<main>
    <h1><?php echo $mainHeadline; ?></h1>
    <!-- maybe an image or something -->
    <table class="candidates">
<?php foreach($people as $fullName => $image ) : ?>
        <tr>
            <td>
<img src="images/<?php echo substr($image, 0, 5); ?>.jpg" alt="<?php echo $fullName; ?>">
            </td>
            <td>
                <?php echo str_replace('_',' ',$fullName) ; ?>
            </td>
            <td>
                <?php echo substr($image, 6); ?>
            </td>
        </tr>
<?php endforeach ; ?>
    </table>

</main>
<aside>
    <h3>Random Rogue</h3>
    <?php

$photos[0] = 'trump';
$photos[1] = 'biden';
$photos[2] = 'clint';
$photos[3] = 'sande';
$photos[4] = 'warre';
$photos[5] = 'harri';
$photos[6] = 'booke';
$photos[7] = 'ayang';
$photos[8] = 'butti';
$photos[9] = 'klobu';
$photos[10] = 'castr';
echo randImages($photos);

?>
<p>randomr andomrandom rando mrandomra ndom randomrand omrandom random random random random random random random randomrandom randomrandom random</p>
</aside>
</div>
<?php include('includes/footer.php'); ?>