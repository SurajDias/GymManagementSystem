<?php
include('db.php');

if (isset($_GET['id'])) {
    $trainer_id = intval($_GET['id']); // sanitize the ID

    // Check if the trainer exists
    $check = $conn->prepare("SELECT * FROM trainers WHERE trainer_id = ?");
    $check->bind_param("i", $trainer_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Delete the trainer
        $delete = $conn->prepare("DELETE FROM trainers WHERE trainer_id = ?");
        $delete->bind_param("i", $trainer_id);

        if ($delete->execute()) {
            echo "<script>
                    alert('✅ Trainer deleted successfully!');
                    window.location.href='view_trainers.php';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Error deleting trainer: " . addslashes($conn->error) . "');
                    window.location.href='view_trainers.php';
                  </script>";
        }

        $delete->close();
    } else {
        echo "<script>
                alert('⚠️ Trainer not found!');
                window.location.href='view_trainers.php';
              </script>";
    }

    $check->close();
} else {
    echo "<script>
            alert('Invalid request!');
            window.location.href='view_trainers.php';
          </script>";
}

$conn->close();
?>
