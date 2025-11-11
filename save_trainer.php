<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $specialization = trim($_POST['specialization']);
    $phone = trim($_POST['phone']);

    // Check for empty values
    if (empty($name) || empty($specialization) || empty($phone)) {
        echo "<script>
                alert('⚠️ Please fill all fields!');
                window.location.href='add_trainer.php';
              </script>";
        exit;
    }

    // Use prepared statement for safety
    $sql = "INSERT INTO trainers (name, specialization, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $specialization, $phone);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Trainer added successfully!');
                window.location.href='view_trainers.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error inserting data: " . addslashes($stmt->error) . "');
                window.location.href='add_trainer.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: add_trainer.php");
    exit;
}
?>

