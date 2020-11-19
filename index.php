<?php

    $conn = mysqli_connect('localhost','admin','admin1234','Tour');

    if(!$conn){
        echo "Connection Error".mysqli_connect_error();
    }

    $sql = "SELECT FullName FROM tblusers";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); ?>
    <div class="header">
      <div class="header--text">
        <div class="header--primary">
          <h1>Traveller</h1>
        </div>
        <div class="header--secondary">
          <h3>Welcome</h3>
        </div>
        <div class="header--btn">
          <button style="cursor:pointer;" onclick="location.href='./Reg_Sign.php'">Get Started</button>
        </div>
      </div>
    </div>
  </body>
</html>
