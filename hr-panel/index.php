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
    $id = $_POST["id"];
    $email = $_POST["email"];
    $sql = "UPDATE employees SET email='$email' WHERE id=$id";
    $conn->query($sql);
}
?>

<form method="POST">
    <input type="text" name="id" placeholder="Enter Employee ID">
    <input type="email" name="email" placeholder="Enter New Email">
    <button type="submit">Update</button>
</form>

