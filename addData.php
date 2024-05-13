<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "registered");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO income (date,type, inco) VALUES (?, ?, ?)");
    $stmt->bind_param("sd", $date,$type, $inco);

    // Set parameters and execute
    $date = $_POST['date'];
    $type=$_POST['type'];
    $income = $_POST['incos'];

    if ($stmt->execute()) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}
?>
