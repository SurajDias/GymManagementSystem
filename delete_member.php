<?php
include('db.php');

if (isset($_GET['id'])) {
    $member_id = intval($_GET['id']); // make sure it's a number

    // Check if member exists
    $check = $conn->prepare("SELECT * FROM members WHERE member_id = ?");
    $check->bind_param("i", $member_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Delete member
        $delete = $conn->prepare("DELETE FROM members WHERE member_id = ?");
        $delete->bind_param("i", $member_id);

        if ($delete->execute()) {
            echo "<script>
                    alert('✅ Member deleted successfully!');
                    window.location.href='view_members.php';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Error deleting member: " . addslashes($conn->error) . "');
                    window.location.href='view_members.php';
                  </script>";
        }

        $delete->close();
    } else {
        echo "<script>
                alert('⚠️ Member not found!');
                window.location.href='view_members.php';
              </script>";
    }

    $check->close();
} else {
    echo "<script>
            alert('Invalid request!');
            window.location.href='view_members.php';
          </script>";
}

$conn->close();
?>
