<?php
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "employees_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name='$name', department='$department', salary='$salary' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM employees");
?>

<form method="POST">
    <select name="id">
        <?php while($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="text" name="name" placeholder="New Name">
    <input type="text" name="department" placeholder="New Department">
    <input type="number" name="salary" placeholder="New Salary">
    <button type="submit">Update</button>
</form>

