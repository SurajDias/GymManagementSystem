<?php
// show PHP errors (useful during development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php'; // your DB connection

// check connection
if (!isset($conn) || !($conn instanceof mysqli)) {
    die("Database connection not available. Check db.php");
}

// fetch all plans
$sql = "SELECT * FROM plans ORDER BY id ASC";
$result = $conn->query($sql);

// stop if query fails
if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Plans</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #111;
      color: #fff;
    }
    h2 {
      text-align: center;
      color: #0ff;
      margin-top: 30px;
      text-shadow: 0 0 8px rgba(0,255,255,0.7);
    }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 20px auto;
      background: #222;
      box-shadow: 0 0 15px rgba(0,255,255,0.2);
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
      text-transform: uppercase;
    }
    tr:nth-child(even) {
      background: #1b1b1b;
    }
    tr:hover {
      background: #0ff;
      color: #000;
      transition: 0.3s;
    }
    a {
      text-decoration: none;
    }
    .delete {
      color: red;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
    }
    .delete:hover {
      background: red;
      color: #000;
      padding: 5px 10px;
      border-radius: 5px;
    }
    .actions {
      display: flex;
      justify-content: center;
      gap: 10px;
    }
    .nav {
      text-align: center;
      margin-top: 25px;
    }
    .nav a {
      margin: 0 10px;
      color: #0ff;
      font-weight: bold;
      border: 1px solid #0ff;
      padding: 8px 15px;
      border-radius: 6px;
      transition: 0.3s;
    }
    .nav a:hover {
      background: #0ff;
      color: #000;
      box-shadow: 0 0 10px #0ff;
    }
  </style>
</head>
<body>
  <h2>📋 Available Plans</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Plan Name</th>
      <th>Duration (Months)</th>
      <th>Price</th>
      <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['plan_name']);
            $dur = htmlspecialchars($row['duration']);
            $price = htmlspecialchars($row['price']);

            echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$dur</td>
                    <td>$price</td>
                    <td class='actions'>
                      <a class='delete' href='delete_plan.php?id=$id' onclick=\"return confirm('Are you sure you want to delete this plan?');\">🗑 Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No plans available</td></tr>";
    }

    $result->free();
    $conn->close();
    ?>
  </table>

  <div class="nav">
    <a href="plan.php">➕ Add New Plan</a>
    <a href="index.php">⬅ Back to Home</a>
  </div>
</body>
</html>

