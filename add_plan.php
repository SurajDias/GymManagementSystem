<?php
include('db.php'); // connects to your MySQL database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan_name = $_POST['plan_name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    // Insert into database
    $sql = "INSERT INTO plans (plan_name, duration, price) VALUES ('$plan_name', '$duration', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>✅ Plan added successfully!</h3>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

echo '<br><a href="plan.php">Back</a>';
$conn->close();
?>
