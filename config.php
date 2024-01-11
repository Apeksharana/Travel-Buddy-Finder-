<?php

$uname="userid ";
$cookie_value =$_POST['uname'];
setcookie($uname, $cookie_value, time() + (86400 * 30), "/");
$pswd =$_POST['pswd'];
$lan=$_POST['lan'];
$dob=$_POST['dob'];
$mail=$_POST['email'];
$gen=$_POST['gen'];
header("Location: index.");

?>
