<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php

                include("db_connection.php");

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['uname'];
                    $email = $_POST['email'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];

                    //verifying unique email id
                    $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

                    if(mysqli_num_rows($verify_query) !=0){
                        echo "<div class='message error'>
                                <p>Email ID already exist!, Try with new one</p>
                                <a href='javascript:self.history.back()' class='btn btn-msg'>Go Back</a>
                            </div>";
                    }
                    else{
                        mysqli_query($con,"INSERT INTO users(username, email, age, password) VALUES ('$name','$email','$age','$password')") or die("Data Insert Error");

                        echo "<div class='message green'>
                                <p>Successfully Registered!</p>
                                <a href='index.php' class='btn btn-msg'>Sign In</a>
                            </div>";
                    }
                }
                else
                { 
                
                ?>

                    <header>Sign Up</header>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" id="uname" autocomplete="off" required>
                        </div>
                        <div class="field input">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" autocomplete="off" required>
                        </div>
                        <div class="field input">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" autocomplete="off" required>
                        </div>
                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" required>
                        </div>
                        <div class="field">
                            <input type="submit" class="btn submit" value="Sign Up">
                        </div>
                        <div class="link">
                            Already have an account? <a href="index.php">Sign In</a>
                        </div>
                    </form>
                <?php } ?>
        </div>
    </div>
</body>

</html>