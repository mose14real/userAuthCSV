<?php
session_start();
if (isset($_POST['submit'])) {
    $s_email = $_POST['email'];
    $s_password = $_POST['password'];
    loginUser($s_email, $s_password);
}
function loginUser($s_email, $s_password) {   
    $users_data = fopen("../storage/users.csv", "r") or die("unable to open users_data!");
    $status = false;
    while(($userdata = fgetcsv($users_data) ) !== FALSE) {
        list($name, $email, $password) = $userdata;
        if($email == $s_email && $password == $s_password) {
            $status = true;
            break;
        }
    }
    fclose($users_data);
    if ($status == true) {
        $_SESSION['username']  = $email;
        header("location: ../dashboard.php");
    } else {
        echo "Email/Password incorrect!";
        header("refresh: 2; ../forms/login.html");
    }
}
?>