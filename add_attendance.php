<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = intval($_POST['member_id']);
    $attendance_date = trim($_POST['attendance_date']);
    $status = trim($_POST['status']);

    // ✅ Step 1: Basic field validation
    if (empty($member_id) || empty($attendance_date) || empty($status)) {
        echo "<script>
                alert('⚠️ Please fill in all fields before submitting!');
                window.location.href='attendance.php';
              </script>";
        exit;
    }

    // ✅ Step 2: Check if the entered Member ID actually exists
    $check = $conn->prepare("SELECT * FROM members WHERE member_id = ?");
    $check->bind_param("i", $member_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 0) {
        echo "<script>
                alert('❌ Member ID not found! Please add the member first.');
                window.location.href='attendance.php';
              </script>";
        exit;
    }

    // ✅ Step 3: Insert attendance safely using prepared statements
    $sql = "INSERT INTO attendance (member_id, attendance_date, status)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $member_id, $attendance_date, $status);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Attendance marked successfully!');
                window.location.href='view_attendance.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding attendance: " . addslashes($stmt->error) . "');
                window.location.href='attendance.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

