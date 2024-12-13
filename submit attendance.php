<?php
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "attendance_system"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO attendance (student_name, date, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $student_name, $date, $status);

// Set parameters and execute
$student_name = $_POST['student_name'];
$date = $_POST['date'];
$status = $_POST['status'];

if ($stmt->execute()) {
    echo "Attendance recorded successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
