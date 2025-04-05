<?php 
session_start();
$servername = "localhost:3307"; 
$username = "root"; 
$password = "";  // Change this if your MySQL has a password
$db_name = "banking"; 

// Creating a connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    echo "Connection failed";
}

if(isset($_POST['submit'])){
    $Id = $_POST["id"];
    $Username = $_POST["username"];
    $Fullname = $_POST["fullname"];
    $Mobilenumber = $_POST["mobilenumber"];
    $Address = $_POST["address"];
    $Gender = $_POST["gender"];
    $Accountnumber = $_POST["accountnumber"];
    $Accountbalance = $_POST["accountbalance"];
    
    // Insert query
   $query = "INSERT INTO users(Id, UserName, Fullname, Mobilenumber, Address, Gender, Accountnumber, Accountbalance) 
             VALUES('$Id', '$Username', '$Fullname', '$Mobilenumber', '$Address', '$Gender', '$Accountnumber', '$Accountbalance')";

    //$query="delete from users where id = 1";
    $data = mysqli_query($conn, $query);

    if ($data) 
    {
        echo "Insert success";
    } 
    else 
    {
        echo "Error";
    }

    // Close the connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Basic Form</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>

<nav class="navbar">
        <div class="container">
          <div class="logo">Admin DashBoard</div>
          <ul>
            <li><a href="user.php">CreateUser</a></li>
            <li><a href="list.php">UserDetails</a></li>
            <li><a href="transaction.php">Transactions</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
      </nav>


<div class="main">
<div class="all" >
      <h1 style= "font-family: Arial, Helvetica, sans-serif;">CREATE USER ACCOUNT</h1>
   <form action="" method="post" class="form">
    <div class="con">  
    <div class="m" >
        <div class="s" >
        <label for="id"><b>Id</label>
        <input type="text" id="id" name="id" required>
        </div>
         
        <div class="s" >
        <label for="name">User Name</label>
        <input type="text" id="name" name="username" required>
        </div>
    
        <div class="s">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="fullname" required>
        </div>

        <div class="s">
        <label for="mobile">Mobile Number</label>
        <input type="tel" id="mobile" name="mobilenumber" required>
        </div>
    </div>  
     <div>
        <div class="s" >
        <label for="address">Address</label>
        <input id="address" name="address" required>
        </div>

        <div class="s">
        <label>Gender</label>
        <input type="text" list="gender" name="gender" required>
        <datalist id="gender">
            <option value="Male">
            <option value="Female">
        </datalist>
        <div>
        
        <!-- <div class="s">
        <label>Account Type</label>
        <input type="text" name="accounttype" list="Account" required>
        <datalist id="Account">
            <option value="Savings">
            <option value="Current">
        </datalist>
        </div> -->
        <div class="s">
        <label for="account_number">Account Number</label>
        <input type="text" name="accountnumber" required>
        </div>
        
        <div class="s">
        <label for="account_balance">Account Balance</label>
        <input type="number" name="accountbalance" required>
        </div>

      
    </div>
    </div>
    
        
</div>
</div>
    
    <div class="submit">
    <!-- <button type="submit" name="submbit" ><a href="login.php">BACK</a></button> -->
    <button type="submit" name="submit">SUBMIT</button>
    </div> 
       
        <!-- <div class="back">
        <button type="submit" name="submbit" ><a href="login.php">BACK</a></button>
        </div> -->
</form>
</body>
</html>
