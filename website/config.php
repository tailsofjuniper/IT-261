<?php
ob_start(); // prevents header errors BEFORE readint home page
define('DEBUG', 'FALSE');  //We want to see our errors.
include('credentials.php');
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
// Candidates Gallery

$people['Donald_Trump'] = 'trump_President from NY';
$people['Joe_Biden'] = 'biden_Former Vice President from PA';
$people['Hilary_Clinton'] = 'clint_Former Secretary of State from NY';
$people['Bernie_Sanders'] = 'sande_Senator from VT';
$people['Elizabeth_Warren'] = 'warre_Senator from MA';
$people['Kamala_Harris'] = 'harri_Senator from CA';
$people['Cory_Booker'] = 'booke_Senator from NJ';
$people['Andrew_Yang'] = 'ayang_Entrepeneur from NY';
$people['Pete_Buttigieg'] = 'butti_Mayor from IN';
$people['Amy_Klobuchar'] = 'klobu_Senator from MN';
$people['Julian_Castro'] = 'castro_Housing/Urban Dev from TX';

switch(THIS_PAGE){
    case 'about.php' :
        $title = 'About Page';
        $mainHeadline = 'Welcome to Our About Page';
        $center = 'center';
        $body = 'about inner';
    break;
    case 'daily.php' :
        $title = 'Daily Donut';
        $mainHeadline = 'View Our Daily Donuts';
        $center = 'center';
        $body = 'daily inner';
    break;
    case 'donuts.php' :
        $title = 'Donut Menu';
        $mainHeadline = 'Our Donut Menu';
        $center = 'center';
        $body = 'donuts inner';
    break;
    case 'contact.php' :
        $title = 'Contact Us';
        $mainHeadline = 'Welcome to Our Contact Page';
        $center = 'center';
        $body = 'contact inner';
    break;
    case 'thx.php' :
        $title = 'Thank you!';
        $mainHeadline = 'Thank you for contacting us!';
        $center = 'center';
        $body = 'contact inner';
    break;
    case 'gallery.php' :
        $title = 'Gallery';
        $mainHeadline = 'Welcome to Our Rogues Gallery';
        $center = 'center';
        $body = 'gallery inner';
    break;
    case 'login.php' :
        $title = 'Login';
        $mainHeadline = 'Login';
        $center = 'center';
        $body = 'login inner';
    break;
    case 'register.php' :
        $title = 'Register';
        $mainHeadline = 'Register';
        $center = 'center';
        $body = 'register inner';
    break;
}

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['donuts.php'] = 'Donut Menu';
$nav['contact.php'] = 'Contact';
$nav['gallery.php'] = 'Gallery';
$nav['login.php'] = 'Login';
$nav['register.php'] = 'Register';

function makeLinks($nav) {
    $myReturn = '';
    foreach($nav as $key => $value) {
        if(THIS_PAGE == $key) {
        $myReturn .= '<li><a href=" '.$key.' " class="active"> '.$value.'</a></li>';
        } else {
            $myReturn .= '<li><a href=" '.$key.' "> '.$value.'</a></li>';
        } // end else
    } // end foreach
return $myReturn; // return myReturn
}
// end function

// implode array of donuts: a function
function myDonuts($donuts) {
    $myReturn = '';
    if(!empty($_POST['donuts'])) {
        $myReturn = implode(', ', $_POST['donuts']);
    }
return $myReturn; // end if
}
// end function

// randImages function
function randImages($photos){
    $i = rand(0, count($photos)-1);
    $selectedImages = 'images/'.$photos[$i].'.jpg';
    echo '<img src="'.$selectedImages.'" alt="random photos">';
}
//end function

// form

$firstName = '';
$lastName = '';
$email = '';
$gender = '';
$pbutter = '';
$donuts = '';
$comments = '';
$privacy = '';
$tel = '';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$genderErr = '';
$pbutterErr = '';
$donutsErr = '';
$commentsErr = '';
$privacyErr = '';
$telErr = '';
$selectedImages = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // declare errors: field empty, wrong type lots of if statements.
    
    if(empty($_POST['firstName'])) {
        $firstNameErr = 'Please enter your first name.';
    } else {
        $firstName = $_POST['firstName'];
    }

    if(empty($_POST['lastName'])) {
        $lastNameErr = 'Please enter your last name.';
    } else {
        $lastName = $_POST['lastName'];
    }

    if(empty($_POST['email'])) {
        $emailErr = 'Please enter your email.';
    } else {
        $email = $_POST['email'];
    }
    
    if(empty($_POST['tel'])) {
        $telErr = 'Please enter your phone number.';
    } else {
        $tel = $_POST['tel'];
    }
        
    if(empty($_POST['gender'])) {
        $genderErr = 'Please enter your gender.';
    } else {
        $gender = $_POST['gender'];
    }

    if(empty($_POST['pbutter'])) {
        $pbutterErr = 'Chunky or smooth?';
    } else {
        $pbutter = $_POST['pbutter'];
    }
    if($pbutter == 'chunky'){
        $chunky ='checked';
    }elseif($pbutter == 'smooth'){
        $smooth = 'checked';
    }

    if(empty($_POST['donuts'])) {
        $donutsErr = 'Please select your favourite donuts.';
    } else {
        $donuts = $_POST['donuts'];
    }

    if(empty($_POST['comments'])) {
        $commentsErr = 'Please enter your comments.';
    } else {
        $comments = $_POST['comments'];
    }

    if(empty($_POST['privacy'])) {
        $privacyErr = 'Please agree to our privacy policy.';
    } else {
        $privacy = $_POST['privacy'];
    }

    if(empty($_POST['tel'])) {  // if empty, type in your number
        $telErr = 'Please enter your telephone number.';
        } elseif(array_key_exists('tel', $_POST)){
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))
        { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
        $telErr = 'Invalid format!';
        } else {
        $tel = $_POST['tel'];
        }
        }

// if user checks boxes, all of them, we want to know.
if(isset($_POST['firstName'],
$_POST['lastName'],
$_POST['email'],
$_POST['tel'],
$_POST['gender'],
$_POST['pbutter'],
$_POST['donuts'],
$_POST['comments'],
$_POST['privacy'])){

$to = ''.$email.'';
$subject = 'Test Email '.date('m/d/y');
$body = 'Name: '.$firstName.' '.$lastName.''.PHP_EOL.'';
$body .= 'Email: '.$email.''.PHP_EOL.'';
$body .= 'Telephone: '.$tel.''.PHP_EOL.'';
$body .= 'Gender: '.$gender.''.PHP_EOL.'';
$body .= 'Peanut butter: '.$pbutter.''.PHP_EOL.'';
$body .= 'donuts: '.myDonuts($photos).''.PHP_EOL.'';
$body .= 'Comments: '.$comments.'';

$headers = array(
    'From' => 'no-reply@jwportal.com',
    'Reply-to' => ''.$email.''
);

mail($to, $subject, $body, $headers) ;
header('Location: thx.php');

} //end isset
} // end server

// AT THE VERY BOTTOM OF THE CONFIG FILE!!!
function myerror($myFile, $myLine, $errorMsg){
    if(defined('DEBUG') && DEBUG){
        echo 'Error in file: <b> '.$myFile.' </b> on line: <b> '.$myLine.' </b>';
        echo 'Error message: <b> '.$errorMsg.'</b>';
        die();
    }else{
        echo 'Oh Snap!';
        die();
    }
}
?>