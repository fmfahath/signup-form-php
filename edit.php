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
        <header>Change Profile</header>
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
                <input type="submit" class="btn submit" value="Update">
            </div>
        </form>
    </div>
</div>