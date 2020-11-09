<?php
    $email=$name=$uname=$password='';
    $errors = array('email' => '', 'name' => '', 'uname' => '');
    if(isset($_POST['reg'])){
        $password = $_POST['password'];

        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        // check name
        if(empty($_POST['name'])){
            $errors['name'] = 'A name is required';
        } else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = 'Title must be letters and spaces only';
            }
        }

        //check uname
        if(empty($_POST['uname'])){
            $errors['uname'] = 'A title is required';
        } else{
            $uname = $_POST['uname'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $uname)){
                $errors['uname'] = 'Title must be letters and spaces only';
            }
        }


        if(array_filter($errors)){
            //echo 'errors in form';
        } else {
            //echo 'form is valid';
            // header('Location: index.php');

            $conn = mysqli_connect('localhost','admin','admin1234','Tourism');

            if(!$conn){
                echo "Connection Error".mysqli_connect_error();
            }

            $sql = "INSERT INTO users(Name, Username, Email, Password) VALUES('$name','$uname','$email','$password')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            mysqli_close($conn);
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
          <input type="text" placeholder="Name" name="name"/><?php echo $errors['uname']?>
          <input type="text" placeholder="Username" name="uname" />
          <input type="email" placeholder="Email" name="email" />
          <input type="password" placeholder="Password" name="password" />
          <input type="password" placeholder="Confirm Password" />
          <input type="submit" value="Sign Up" name="reg"/>
        </div>
        <div class="login">
          <h1>Log in</h1>
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <input type="submit" name="sign_in" value="Sign in"/>
        </div>
      </form>
    </div>
  </body>
</html>
