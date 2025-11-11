<?php
include('db.php');

// Fetch all members
$sql = "SELECT * FROM members ORDER BY member_id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Members</title>
  <link rel="stylesheet" href="style.css">
  <style>
    h1 {
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
  </style>
</head>
<body>

<h1>Member List</h1>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Contact</th>
    <th>Membership Type</th>
    <th>Action</th>
  </tr>

  <?php
  if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['member_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['age']}</td>
                  <td>{$row['gender']}</td>
                  <td>{$row['contact']}</td>
                  <td>{$row['membership_type']}</td>
                  <td><a class='delete' href='delete_member.php?id={$row['member_id']}' onclick=\"return confirm('Delete this member?');\">🗑 Delete</a></td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='7'>No members found</td></tr>";
  }

  $conn->close();
  ?>
</table>

<div class="nav">
  <a href="add_member.php">➕ Add New Member</a>
  <a href="index.php">⬅ Back</a>
</div>

</body>
</html>

