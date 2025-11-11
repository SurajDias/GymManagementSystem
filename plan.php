<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan_name = $_POST['plan_name'];
    $duration = intval($_POST['duration']);
    $price = floatval($_POST['price']);

    // Prepare and execute insert query (no plan_id, since 'id' is AUTO_INCREMENT)
    $sql = "INSERT INTO plans (plan_name, duration, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sid", $plan_name, $duration, $price);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Plan added successfully!');
                window.location.href='view_plan.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding plan: " . addslashes($stmt->error) . "');
                window.location.href='plan.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>📦 Add Plan</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #111;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 40px;
    }

    h2 {
      color: #0ff;
      margin-bottom: 20px;
      text-shadow: 0 0 8px rgba(0,255,255,0.7);
    }

    form {
      background: #222;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,255,255,0.2);
      width: 340px;
      text-align: center;
    }

    input, select {
      width: 90%;
      margin: 8px 0;
      padding: 10px;
      background: #333;
      color: #fff;
      border: 1px solid #0ff;
      border-radius: 5px;
    }

    input::placeholder {
      color: #bbb;
    }

    select {
      cursor: pointer;
    }

    button {
      width: 95%;
      margin-top: 12px;
      background: #0ff;
      color: #000;
      font-weight: bold;
      padding: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #0cc;
      box-shadow: 0 0 10px #0ff;
    }

    a {
      text-decoration: none;
      color: #0ff;
      margin-top: 20px;
      transition: 0.3s;
    }

    a:hover {
      background: #0ff;
      color: #000;
      padding: 6px 12px;
      border-radius: 8px;
    }
  </style>
</head>
<body>

  <h2>📦 Add New Plan</h2>

  <form method="POST" action="plan.php">
    <select name="plan_name" required>
      <option value="" disabled selected>Select Plan Type</option>
      <option value="Weight Loss">🏃 Weight Loss</option>
      <option value="Bulking">💪 Bulking</option>
      <option value="Cutting">🔥 Cutting</option>
      <option value="Lean Bulk">⚡ Lean Bulk</option>
      <option value="Maintenance">⚖️ Maintenance</option>
      <option value="Strength Training">🏋️ Strength Training</option>
      <option value="Cardio Focus">❤️ Cardio Focus</option>
    </select><br>

    <input type="number" name="duration" placeholder="Duration (Months)" required><br>
    <input type="number" step="0.01" name="price" placeholder="Price (₹)" required><br>

    <button type="submit">✅ Add Plan</button>
  </form>

  <a href="index.php">⬅ Back to Home</a>

</body>
</html>


