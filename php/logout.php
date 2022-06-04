<?php
session_start();
function logout(){
    session_destroy();
    echo "Logging you out";
    header("refresh: 2; ../forms/login.html");
}
logout();