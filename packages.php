<?php
    session_start();
    
    $conn = mysqli_connect('localhost','admin','admin1234','Tour');

    if(!$conn){
        echo "Connection Error".mysqli_connect_error();
    }

    $sql = "SELECT * FROM tbltourpackages";

    $result = mysqli_query($conn, $sql);

    $packages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<?php include('./includes/header.php'); ?>
    <link rel="stylesheet" href="./CSS/packages.css" />
    <?php foreach($packages as $package){ ?>
        <div class="package">
            <h1><?php print_r($package['PackageName']); echo $_SESSION["email"];
            ?></h1>
            <a href="package.php?pkgid=<?php echo $package['PackageId']; ?>">Click for more info!</a>
        </div>
    <?php } ?>
</body>
</html> 
