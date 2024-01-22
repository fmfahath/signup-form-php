<?php
    session_start();
    include("db_connection.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
   <div class="nav">
        <div class="logo">
            <a href="home.php"><p>Logo</p></a>
        </div>

        <div class="right-links"> 
            <a href="#">Change Profile</a>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
   </div> 

   <div class="container">
    <div class="box form-box">
        <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['uname'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $update_query = mysqli_query($con,"UPDATE users SET username='$username', email='$email', age='$age' WHERE id='$id'") or die("Update Error");

                if($update_query){
                    echo "<div class='message green'>
                            <p>Profile Updated</p>
                            <a href='home.php' class='btn btn-msg'>Home Page</a>
                        </div>";
                }
                else{
                    echo "<div class='message error'>
                    <p>Profile Updated Failed</p>
                    <a href='hoe.php' class='btn btn-msg'>Home Page</a>
                </div>";
                }
            }
            else{
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE id='$id'") or die("Query Select Error");

                while($result = mysqli_fetch_assoc($query)){
                    $username = $result['username'];
                    $age = $result['age'];
                    $email = $result['email'];
                }
            
        ?>
        <header>Change Profile</header>
        <form action="" method="post">
            <div class="field input">
                <label for="uname">Username</label>
                <input type="text" name="uname" id="uname" value="<?php echo $username ?>" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email ?>" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?php echo $age ?>" autocomplete="off" required>
            </div>
            <div class="field">
                <input type="submit" class="btn submit" value="Update">
            </div>
        </form>
        <?php } ?>
    </div>
</div>