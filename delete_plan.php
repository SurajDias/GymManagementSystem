<?php
include 'db.php'; // use the same connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input

    // Check if record exists before deleting
    $check = $conn->query("SELECT * FROM plans WHERE id = $id");
    if ($check && $check->num_rows > 0) {
        $sql = "DELETE FROM plans WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Plan deleted successfully!'); window.location.href='view_plan.php';</script>";
        } else {
            echo "<script>alert('Error deleting record: " . addslashes($conn->error) . "'); window.location.href='view_plan.php';</script>";
        }
    } else {
        echo "<script>alert('Plan not found!'); window.location.href='view_plan.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='view_plan.php';</script>";
}

$conn->close();
?>



