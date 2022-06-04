<?php
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
registerUser($fullname, $email, $password);
}
function registerUser($fullname, $email, $password){
    //save data into the file
    $file_open = fopen("../storage/users.csv", "a");
    fputcsv($file_open, [$fullname, $email, $password]);
    fclose($file_open);
}
echo "User Successfully registered";
header("refresh: 2; ../forms/login.html");
?>