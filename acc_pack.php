<?php
session_start();
$email = $_SESSION["email"];
echo $email;
if(isset($_POST['sub'])){
    $conn = mysqli_connect('localhost','admin','admin1234','Tour');

    if(!$conn){
        echo "Connection Error".mysqli_connect_error();
    }
    $package = $_POST['pac'];

    $sql = "INSERT INTO tblbooking (UserEmail,package) VALUE ('{$_SESSION["email"]}','$package')";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
    header('Location: show_pack.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <h1>Hey</h1>
    <input type="text" name="pac" placeholder="package" />
    <input type="submit" name="sub" placeholder="click" />
    </form> 
</body>
</html>