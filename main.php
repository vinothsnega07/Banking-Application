<?php
session_start();
$servername = "localhost:3307"; 
$username = "root"; 
$password = "";  
$db_name = "banking"; 

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) 
{
    echo "Connection failed";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $UserName = $_POST["username"];
    $PassWord = $_POST["password"];

    // Prevent SQL injection
    $UserName = mysqli_real_escape_string($conn, $UserName);
    $PassWord = mysqli_real_escape_string($conn, $PassWord);

    // Fetch user details from admins table
    $query = "SELECT * FROM admins WHERE UserName='$UserName'";
    $result = mysqli_query($conn, $query);

    // Check if a row is returned
    if ($result) 
    {
        $row = mysqli_fetch_assoc($result);

        // Ensure the PassWord column exists in the database
        if (isset($row['PassWord'])) 
        {
            $db_password = $row['PassWord']; 
            
            // Compare entered password with stored password
            if ($PassWord == $db_password) 
            { 
            //  if (password_verify($PassWord, $db_password)) 
            // {  
                $_SESSION["user"] = $UserName;
                header("Location: login.php");
                exit();
            } 
            else 
            {
                echo "<script>alert('Invalid password!');</script>";
            }
        } 
        else 
        {
            echo "<script>alert('PassWord column missing in the database. Check column name!');</script>";
        }
    } 
    else 
    {
        echo "<script>alert('Invalid username!');</script>";
    }
}

// Close connection
mysqli_close($conn);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="main">
    <div class="form">
    <h2 style="font-size: 30px;">ADMIN</h2>

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
    <button type="submit" name="submit">LOGIN</button>
    </div> 

    <div class="signup">
    <button type="submit" name="submbit" ><a href="signup.php">NEW USER</a></button>
    </div>
    
</form>
    </div>
    </div>
</body>
</html>

