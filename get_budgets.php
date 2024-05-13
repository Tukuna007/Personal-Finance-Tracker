<?php
// Connect to your MySQL database (replace these variables with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registered";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch budgets in ascending order
$sql = "SELECT * FROM expenses ORDER BY date ASC";
$result = $conn->query($sql);

$budgets = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $budgets[] = $row;
  }
}

// Output budgets as JSON
echo json_encode($budgets);

$conn->close();
?>
