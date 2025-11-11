<?php
include('db.php');

if (isset($_GET['id'])) {
    $payment_id = intval($_GET['id']);

    $sql = "DELETE FROM payments WHERE payment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payment_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Payment deleted successfully!');
                window.location.href='payments.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error deleting payment: " . addslashes($stmt->error) . "');
                window.location.href='payments.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
            alert('Invalid request!');
            window.location.href='payments.php';
          </script>";
}
?>
