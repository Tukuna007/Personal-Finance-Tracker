<?php
include 'database.php'; // Include your database connection

// Get budget data from the frontend
$month = $_POST['month'];
$diningOut = $_POST['diningOut'];
$transportation = $_POST['transportation'];
$clothing = $_POST['clothing'];

// Prepare and execute SQL query to insert or update budget data in the database
$sql = "INSERT INTO budgets (month, category, budget_amount) VALUES
        ('$month', 'Dining Out', $diningOut),
        ('$month', 'Transportation', $transportation),
        ('$month', 'Clothing', $clothing)
        ON DUPLICATE KEY UPDATE budget_amount = VALUES(budget_amount)";

if ($conn->query($sql) === TRUE) {
    $response = ['success' => true, 'message' => 'Budgets saved successfully!'];
    echo json_encode($response);
} else {
    $response = ['success' => false, 'message' => 'Error: ' . $conn->error];
    echo json_encode($response);
}

$conn->close();
?>
