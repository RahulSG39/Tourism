<?php
session_start();
    $conn = mysqli_connect('localhost','admin','admin1234','Tour');

    if(!$conn){
        echo "Connection Error".mysqli_connect_error();
    }

    $sql = "SELECT package FROM tblbooking WHERE UserEmail = '{$_SESSION['email']}'";

    $result = mysqli_query($conn, $sql);

    $packages = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $tours = array();
    foreach($packages as $package=>$pack){
        foreach($pack as $p){
            array_push($tours,$p);

        }
    }
    $tours = array_unique($tours);

    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<?php include('./includes/header.php'); ?>
<link rel="stylesheet" href="./CSS/packages.css" />
    <form method="POST">
        <?php foreach($tours as $tour){ ?>
            <div class="package">
                <h1><?php echo $tour; echo $_SESSION["email"];?></h1>
            </div>
        <?php } ?>
        <button type="submit" name="logout" >LOGOUT</button>
    </form>
    
</body>
</html>