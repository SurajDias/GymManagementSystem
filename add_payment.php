<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = intval($_POST['member_id']);
    $amount = floatval($_POST['amount']);
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO payments (member_id, amount, payment_date, status)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idss", $member_id, $amount, $payment_date, $status);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Payment added successfully!');
                window.location.href='payments.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding payment: " . addslashes($stmt->error) . "');
                window.location.href='payments.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: payments.php");
    exit;
}
?>
