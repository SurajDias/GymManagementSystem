<?php
include('db.php');

// Handle data fetch
$sql = "
SELECT p.payment_id, m.name, p.amount, p.payment_date, p.status
FROM payments p
JOIN members m ON p.member_id = m.member_id
ORDER BY p.payment_date DESC
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payments | Gym Management System</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #111;
      color: #fff;
    }
    h1 {
      color: #0ff;
      margin-top: 20px;
    }
    table {
      width: 85%;
      margin: 25px auto;
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
    }
    tr:nth-child(even) {
      background: #1b1b1b;
    }
    tr:hover {
      background: #0ff;
      color: #000;
    }
    .form-section {
      width: 400px;
      background: #222;
      margin: 40px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,255,255,0.3);
    }
    input, select {
      width: 90%;
      padding: 8px;
      margin: 8px 0;
      border-radius: 5px;
      border: none;
      outline: none;
    }
    input[type="submit"] {
      background: #0ff;
      color: #000;
      cursor: pointer;
      font-weight: bold;
    }
    input[type="submit"]:hover {
      background: #0cc;
    }
    .back-link {
      text-align: center;
      display: block;
      margin-top: 20px;
      color: #0ff;
      text-decoration: none;
      border: 1px solid #0ff;
      border-radius: 6px;
      padding: 8px 15px;
      width: 150px;
      margin: 20px auto;
    }
    .back-link:hover {
      background: #0ff;
      color: #000;
    }
  </style>
</head>
<body>

<h1>💳 Payments</h1>

<!-- Add Payment Form -->
<div class="form-section">
  <h3>Add Payment</h3>
  <form action="add_payment.php" method="POST">
    <input type="number" name="member_id" placeholder="Member ID" required><br>
    <input type="number" step="0.01" name="amount" placeholder="Amount" required><br>
    <input type="date" name="payment_date" required><br>
    <select name="status" required>
      <option value="Paid">Paid</option>
      <option value="Pending">Pending</option>
    </select><br>
    <input type="submit" value="Add Payment">
  </form>
</div>

<!-- Payment Records Table -->
<table>
  <tr>
    <th>ID</th>
    <th>Member</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php
  if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['payment_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['amount']}</td>
                  <td>{$row['payment_date']}</td>
                  <td>{$row['status']}</td>
                  <td><a class='delete' href='delete_payment.php?id={$row['payment_id']}' onclick=\"return confirm('Delete this payment record?');\">🗑 Delete</a></td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='6'>No payment records found.</td></tr>";
  }
  $conn->close();
  ?>
</table>

<a href="index.php" class="back-link">⬅ Back</a>

</body>
</html>

