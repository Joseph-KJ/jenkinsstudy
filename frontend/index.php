<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "employee_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sql = "INSERT INTO employees (name, email) VALUES ('$name', '$email')";
    $conn->query($sql);
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name">
    <input type="email" name="email" placeholder="Enter Email">
    <button type="submit">Submit</button>
</form>

