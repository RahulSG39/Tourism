<?php
    session_start();
    $email=$name=$uname=$password='';
    $errors = array('email' => '', 'name' => '', 'password' => '', 'confirm_password' => '');
    if(isset($_POST['reg'])){

        $conn = mysqli_connect('localhost','admin','admin1234','Tour');

        if(!$conn){
            echo "Connection Error".mysqli_connect_error();
        }
    
        $password = $_POST['password'];
        $email = $_POST['email'];

        $duplicate=mysqli_query($conn,"SELECT * FROM tblusers WHERE EmailId='$email'");
        if (mysqli_num_rows($duplicate)>0)
        {
            $errors['email'] = "Email id already exists.";
        }
        else{
                if(empty($_POST['email'])){
                $errors['email'] = 'An email is required';
            } else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = 'Email must be a valid email address';
                }
            }
        }

        // check email
        

        // check name
        if(empty($_POST['name'])){
            $errors['name'] = 'A name is required';
        } else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = 'Name must be letters and spaces only';
            }
        }

 


        if(empty($_POST['password'] || $_POST['password'] )){
            $errors['password'] = 'A password is required';
        } else{
            $password = $_POST['password'];
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $password)) {
                $errors['password'] = 'the password does not meet the requirements!';
            }
        }

        if(empty($_POST['confirm_password'])){
            $errors['confirm_password'] = 'A password is required';
        } else{
            $confirm_password = $_POST['confirm_password'];
            if($confirm_password != $password){
                $errors['confirm_password'] = 'Passwords do not match';
            }
        }


        if(array_filter($errors)){
            //echo 'errors in form';
        } else {
            //echo 'form is valid';
            // header('Location: index.php');

            $conn = mysqli_connect('localhost','admin','admin1234','Tour');

            if(!$conn){
                echo "Connection Error".mysqli_connect_error();
            }

            $sql = "INSERT INTO tblusers(FullName, EmailId, Password) VALUES('$name','$email','$password')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            mysqli_close($conn);
        }
        
    }

    if(isset($_POST['sign_in'])){

        $conn = mysqli_connect('localhost','admin','admin1234','Tour');

        if(!$conn){
            echo "Connection Error".mysqli_connect_error();
        }
        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];

        $sql1 = "SELECT * FROM tblusers WHERE EmailId = '$login_email' AND Password = '$login_password'";

        if (mysqli_query($conn, $sql1)) {
            $_SESSION["email"] = $_POST["login_email"];
            header('Location: packages.php');

        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }

    }



?>

<!DOCTYPE html>
<html>
    <?php include('./includes/header.php'); ?>
    <link rel="stylesheet" href="./CSS/Reg_Sign.css" />
    <div class="form-wrap">
      <form method="POST">
        <div class="reg">
          <h1>Sign Up</h1>
          <input type="text" placeholder="Name" name="name"/><?php echo $errors['name']?>
          <!-- <input type="text" placeholder="Username" name="uname" /> -->
          <input type="email" placeholder="Email" name="email" /><?php echo $errors['email']?>
          <input type="password" placeholder="Password" name="password" /><?php echo $errors['password']?>
          <input type="password" placeholder="Confirm Password" name="confirm_password"/><?php echo $errors['confirm_password']?>
          <input type="submit" value="Sign Up" name="reg"/>
        </div>
        <div class="login">
          <h1>Log in</h1>
          <input type="email" placeholder="Email" name="login_email" />
          <input type="password" placeholder="Password" name="login_password"/>
          <input type="submit" name="sign_in" value="Sign in"/>
        </div>
      </form>
    </div>
  </body>
</html>
