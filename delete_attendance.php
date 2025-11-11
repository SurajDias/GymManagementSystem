<?php
include('db.php');

if (isset($_GET['id'])) {
    $attendance_id = intval($_GET['id']); // ensure integer value

    // Check if the record exists
    $check = $conn->prepare("SELECT * FROM attendance WHERE id = ?");
    $check->bind_param("i", $attendance_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Record found → delete
        $delete = $conn->prepare("DELETE FROM attendance WHERE id = ?");
        $delete->bind_param("i", $attendance_id);

        if ($delete->execute()) {
            echo "<script>
                    alert('✅ Attendance record deleted successfully!');
                    window.location.href='view_attendance.php';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Error deleting record: " . addslashes($conn->error) . "');
                    window.location.href='view_attendance.php';
                  </script>";
        }

        $delete->close();
    } else {
        echo "<script>
                alert('⚠️ Record not found!');
                window.location.href='view_attendance.php';
              </script>";
    }

    $check->close();
} else {
    echo "<script>
            alert('Invalid request!');
            window.location.href='view_attendance.php';
          </script>";
}

$conn->close();
?>
