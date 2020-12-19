<?php //server.php//
session_start();
include('config.php');

$FirstName = '';
$LastName = '';
$Email = '';
$UserName = '';
$errors = array();
$success = 'You are now logged in';

// connect ot the database//

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//register//
if(isset($_POST['reg_user'])){
    //receive info//
    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
    $Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);

if(empty($FirstName)){
    array_push($errors, 'First name is required');
}
if(empty($LastName)){
    array_push($errors, 'Last name is required');
}
if(empty($Email)){
    array_push($errors, 'Email is required');
}
if(empty($UserName)){
    array_push($errors, 'User Name is required');
}
if(empty($Password_1)){
    array_push($errors, 'Password is required');
}
if($Password_1 != $Password_2){
    array_push($errors, 'Password does not match');
}

$user_check_query = "SELECT * FROM Users WHERE UserName = '$UserName' OR Email = '$Email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if($user){
    if($user['UserName'] === $UserName){
        array_push($errors, 'UserName already exists');
    }
    if($user['Email'] === $Email){
        array_push($errors, 'User email already exists');
    }

} // end if user //

if(count($errors)==0){
$Password = md5($Password_1);

$query = "INSERT INTO Users (FirstName, LastName, UserName, Email, Password) VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";
mysqli_query($db, $query);

$_SESSION['UserName'] = $UserName;
$_SESSION['success'] = $success;

header('Location: login.php');

} // end count //

} // end if isset //

//return to server.php to enter login infor //

if(isset($_POST['login_user'])){
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);

    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if(empty($UserName)){
        array_push($errors, 'UserName is required');
    }
    if(empty($Password)){
        array_push($errors, 'Password is required');
    }

    if(count($errors)==0){
        $Password = md5($Password);

$query= "SELECT * FROM Users WHERE UserName = '$UserName' AND Password = '$Password'";

$results = mysqli_query($db, $query);

if(mysqli_num_rows($results) == 1){
    $_SESSION['UserName'] = $UserName;
    $_SESSION['success'] = $success;
    header('Location: index.php');

}else{
    array_push($errors, 'Wrong username/password combination');
}
    } // close count //

} // close isset //