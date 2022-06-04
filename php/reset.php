<?php
if(isset($_POST['submit'])){
    $s_email = $_POST['email'];
    $new_password = $_POST['password'];
    resetPassword($s_email, $new_password);
}
function resetPassword($s_email, $new_password){
    $file = "../storage/users.csv";
    $users_data = fopen($file, "r") or die("unable to open");
    $status = false;
    $updated_rows = '';
    while(($userdata = fgetcsv($users_data) ) !== FALSE) {
        list($name, $email, $password) = $userdata;
        if($email == $s_email) {
            $userdata[2] = $new_password;
            $status = true;
        }
        $updated_rows .= implode(',',$userdata). "\r\n";
    }
    fclose($users_data);
    if ($status == true) {
        file_put_contents( $file, $updated_rows);
        echo "Your password has been updated successfully";
        header("refresh: 2; ../forms/login.html");
    } else {
        echo "User does not exist!";
        header("refresh: 2;../forms/resetpassword.html");
    }
}