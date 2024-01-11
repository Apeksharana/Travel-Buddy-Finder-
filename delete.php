<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sidekick");

if (!$conn) {
    echo "not connected";
    exit;
}
$name= mysqli_real_escape_string($conn, $_POST['name']); // Sanitize user input
$psw= mysqli_real_escape_string($conn, $_POST['psw']); // Sanitize user input

$query = "DELETE FROM user WHERE userid='$name'";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script type='text/javascript'>
                alert('Account Delete');
                window.location.href='index.html';
              </script>";
        exit();
}
else{
    die("Query failed: " . mysqli_error($conn));
}


mysqli_close($conn);
 ?>
