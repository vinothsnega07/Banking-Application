<?php 
session_start();
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

// Query to fetch data
$query = "SELECT Id, Username, Fullname, Mobilenumber, Address, Gender, Accountnumber, Accountbalance FROM users";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    
    <link rel="stylesheet" href="list.css">
</head>
<body>

<nav class="navbar">
        <div class="container">
          <div class="logo">Admin DashBoard</div>
          <ul>
            <li><a href="user.php">CreateUser</a></li>
            <li><a href="product.html">UserDetails</a></li>
            <li><a href="transaction.php">Transactions</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
</nav>



<h2>User Details</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Mobilenumber</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Accountnumber</th>
        <th>Accountbalance</th>
    </tr>

    <?php 
    if ($result ) 
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr>
                    <td>{$row['Id']}</td>
                    <td>{$row['Username']}</td>
                    <td>{$row['Fullname']}</td>
                    <td>{$row['Mobilenumber']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Accountnumber']}</td>
                    <td>{$row['Accountbalance']}</td>
                  </tr>";
        }
    } 
    else 
    {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }

    // Close connection
    mysqli_close($conn);
    ?>
</table>

</body>
</html>
