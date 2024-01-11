<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sidekick");

if (!$conn) {
    echo "not connected";
    exit;
}

$uname = mysqli_real_escape_string($conn, $_POST['uname']); // Sanitize user input
$pswd = mysqli_real_escape_string($conn, $_POST['pswd']); // Sanitize user input
$email = mysqli_real_escape_string($conn, $_POST['email']); // Sanitize user input
$gender = mysqli_real_escape_string($conn, $_POST['r1']); // Sanitize user input
$dob = mysqli_real_escape_string($conn, $_POST['dob']); // Sanitize user input
$lan = mysqli_real_escape_string($conn, $_POST['lan']); // Sanitize user input
$_SESSION['name']=$uname;
// $query= "INSERT INTO user Values('$uname','$pswd','$dob','$email','$gender','$lan')";
// $result = mysqli_query($conn, $query);
$q="SELECT * FROM user WHERE userid='$uname'";
$q1="SELECT * FROM user WHERE email='$email'";
$r=mysqli_query($conn, $q);
$r1=mysqli_query($conn, $q1);
if (mysqli_num_rows($r) > 0) {
    echo "<script type='text/javascript'>
            alert('Name already exist');
            window.location.href='signup.html';
            </script>";
        exit();
}
else if (mysqli_num_rows($r1) > 0){
    echo "<script type='text/javascript'>
            alert('Email already exist. Please Login');
            window.location.href='signup.html';
            </script>";
        exit();
}
else{
    $query= "INSERT INTO user Values('$uname','$pswd','$dob','$email','$gender','$lan')";
    $result = mysqli_query($conn, $query);
} 


if (!$r1) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<html>
    <head>
    <title>Sidekick</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    </head>
    <body style="background-image: url(back.jpeg);">
    <div class="nav">
        <img src="logo.png" width="300" height="40">
        <h6 ></h6>
    </div>
    <h2 style="margin-top: 5%;">Choose the place you would like to visit.</h2>
    <b>Select atleast two choose</b>
  
    <form action="profile.php" method="post"  style="margin-top:40px" name="form1">
    <!-- <input type="text" name="uname" class="form-container" placeholder="Re-Enter name" required> -->
    <div class="row" style="margin-top: 30px;">
    <center>
        <div class="column" style="margin-left: 10%;">
            <img src="ipic1.jpeg" height="200" width="200" class="side"><br>
            <input type="checkbox" name="ch[]" value="Historical" onclick="chkcontrol(0)">Historical
        </div>
        <div class="column">
            <img src="ipic2.jpeg" height="200" width="200" class="side"><br>
            <input type="checkbox" name="ch[]" value="Beach" onclick="chkcontrol(1)">Beach
        </div>
        <div class="column">
            <img src="ipic3.jpeg" height="200" width="200" class="side" ><br>
            <input type="checkbox" name="ch[]" value="Religious" onclick="chkcontrol(2)">Religious
        </div>
    </center>
     </div>
    <div class="row" style="margin-top: 30px;">
    <center>
        <div class="column" style="margin-left: 10%;">
            <img src="ipic5.jpeg" height="200" width="200" class="side"><br>
            <input type="checkbox" name="ch[]" value="Agrotourism" onclick="chkcontrol(3)">Agrotourism
        </div>
        <div class="column">
            <img src="ipic6.jpeg" height="200" width="200" class="side"><br>
            <input type="checkbox" name="ch[]" value="Wild life" onclick="chkcontrol(4)">Wild life
        </div>
        <div class="column">
            <img src="ipic4.jpeg" height="200" width="200" class="side"><br>
            <input type="checkbox" name="ch[]" value="Mountain"onclick="chkcontrol(5)">Mountain
     </center>
    </div>
    <div align="right">
        <a href="signup.html" class="l" style="margin-top: 10px;"><u>BACK</u></a>
        <button class=button name="Submit">Submit</button>
    </div>
    </form>
    <!-- <script type="text/javascript">
function chkcontrol(j) {
var total=0;
var chckbox=document.forms['form1']['ch[]'];
for(var i=0; i < chckbox.length; i++){
if(chckbox[i].checked){
total =total +1;}
if(total > 4){
alert("Please Select only four") 
chckbox.checked = false ;
return false;
}
}
} </script> -->

</body>
</html>
