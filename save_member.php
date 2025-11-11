<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = intval($_POST['member_id']);
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $contact = trim($_POST['contact']);
    $membership_type = trim($_POST['membership_type']);

    // Use prepared statement (safe and reliable)
    $sql = "INSERT INTO members (member_id, name, age, gender, contact, membership_type)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisss", $member_id, $name, $age, $gender, $contact, $membership_type);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Member added successfully!');
                window.location.href='view_members.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding member: " . addslashes($stmt->error) . "');
                window.location.href='add_member.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
            alert('Invalid request!');
            window.location.href='add_member.php';
          </script>";
}
?>

