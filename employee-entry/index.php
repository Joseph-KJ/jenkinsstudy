<?php
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "employees_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, department, salary) VALUES ('$name', '$department', '$salary')";
    if ($conn->query($sql) === TRUE) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="department" placeholder="Department" required>
    <input type="number" name="salary" placeholder="Salary" required>
    <button type="submit">Submit</button>
</form>

