<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

            <?php
              
              include("db_connection.php");

              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
                $row = mysqli_fetch_assoc($result);

                // echo $row['email'] . $row['password'];

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['id'] = $row['id'];

                    header("Location: home.php");
                    // echo "success!";
                }
                else{
                    echo "<div class='message error'>
                            <p>Wrong Username or Password!</p>
                            <a href='index.php' class='btn btn-msg'>Go Back</a>
                        </div>";
                }
              }
              else{

            ?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" value="Login">
                </div>
                <div class="link">
                    Don't have an account? <a href="register.php">Sign Up Now</a> 
                </div>
            </form>
             <?php }  ?>
        </div>
    </div>
</body>
</html>