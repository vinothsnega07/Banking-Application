<?php 

$servername = "localhost:3307"; 
$username = "root"; 
$password = "";  // Change this if your MySQL has a password
$db_name = "banking"; 

// Creating a connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) 
{
    echo "Connection failed";
}
// Check if form is submitted
if(isset($_POST['submit']))
{
    $Username = mysqli_real_escape_string($conn, $_POST["username"]);
    $Password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Insert query into admins table (storing plain text password)
    $query = "INSERT INTO admins (UserName, PassWord) VALUES ('$Username', '$Password')";

    $data = mysqli_query($conn, $query);

    if ($data) 
    {
        echo "User registered successfully!";
    }
    else 
    {
        echo "Unable to register user";
    }

    // Close the connection
    mysqli_close($conn);
}

?> 






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="main">
    <div class="form">
    <h2>ADMIN REGISTRATION</h2>
    <form action="" method="POST" autocomplete="off">
    
    <div class="user">
    <label for="username"><b>UserName</label>
    <input type="text" name="username" value="" autocomplete="off">
    <!-- <input type="text" name="username"> -->
    </div>
    
    <div class="pass">
    <label for="password">Password</label>
    <input type="password" name="password" value="" autocomplete="new-password">
    <!-- <input type="password" name="password"> -->
    </div>
    
    <div class="login">
    <button type="submit" name="submit">SUBMIT</button>
    </div>   
    <div class="signup">
    <button type="submit" name="submbit" ><a href="main.php">LOGIN</a></button>
    </div> 

</form>
    </div>
    </div>
</body>
</html>