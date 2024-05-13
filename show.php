<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "", "registered");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT date, type, amount FROM expenses";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data in a nice order
    echo "<table>";
    echo "<tr><th>Date</th><th>Type</th><th>Income</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["amount"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>

