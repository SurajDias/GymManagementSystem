<?php
include('db.php');

// ✅ Fetch all attendance records along with member names
$sql = "SELECT 
            a.id,
            m.name AS member_name,
            a.attendance_date,
            a.status
        FROM attendance a
        INNER JOIN members m ON a.member_id = m.member_id
        ORDER BY a.id DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h2 {
            color: #0ff;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 85%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #222;
            box-shadow: 0 0 10px rgba(0,255,255,0.2);
        }
        th, td {
            border: 1px solid #0ff;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #0ff;
            color: #000;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #1b1b1b;
        }
        tr:hover {
            background: #0ff;
            color: #000;
            transition: 0.3s;
        }
        .nav {
            text-align: center;
            margin-top: 20px;
        }
        .nav a {
            color: #0ff;
            border: 1px solid #0ff;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin: 0 10px;
        }
        .nav a:hover {
            background: #0ff;
            color: #000;
        }
        .delete {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
        .delete:hover {
            background: red;
            color: #000;
            padding: 5px 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>📅 Attendance Records</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Member Name</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['member_name']}</td>
                    <td>{$row['attendance_date']}</td>
                    <td>{$row['status']}</td>
                    <td><a class='delete' href='delete_attendance.php?id={$row['id']}' onclick=\"return confirm('Delete this record?');\">🗑 Delete</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No attendance records found</td></tr>";
    }
    $conn->close();
    ?>
</table>

<div class="nav">
    <a href="attendance.php">➕ Add Attendance</a> |
    <a href="index.php">⬅ Back to Home</a>
</div>

</body>
</html>

