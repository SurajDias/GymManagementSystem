<?php
// --- Session protection ---
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🏋️ Gym Management System</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    h1 {
      font-size: 2em;
      margin-bottom: 20px;
      border-bottom: 2px solid #0ff;
      padding-bottom: 10px;
      color: #0ff;
    }
    .admin-bar {
      text-align: center;
      margin-bottom: 30px;
      color: #0ff;
      font-size: 1.1em;
    }
    .dashboard {
      display: grid;
      grid-template-columns: repeat(2, 220px);
      gap: 20px;
      justify-content: center;
    }
    .dashboard a {
      color: #0ff;
      background: #222;
      text-decoration: none;
      font-size: 1.1em;
      border: 2px solid #0ff;
      border-radius: 10px;
      padding: 20px;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(0,255,255,0.2);
    }
    .dashboard a:hover {
      background: #0ff;
      color: #000;
      box-shadow: 0 0 15px #0ff;
      transform: scale(1.05);
    }
    footer {
      position: absolute;
      bottom: 10px;
      color: #888;
      font-size: 0.9em;
    }
    .logout {
      margin-top: 10px;
      display: inline-block;
      color: #f33;
      border: 1px solid #f33;
      padding: 8px 15px;
      border-radius: 6px;
      text-decoration: none;
    }
    .logout:hover {
      background: #f33;
      color: #000;
      box-shadow: 0 0 10px #f33;
    }
  </style>
</head>
<body>

  <h1>🏋️ Gym Management System</h1>

  <div class="admin-bar">
    <p>Welcome, <strong>Admin</strong> 👋</p>
    <p>📅 <span id="datetime"></span></p>
    <a href="logout.php" class="logout">🚪 Logout</a>
  </div>

  <div class="dashboard">
    <a href="add_member.php">➕ Add Member</a>
    <a href="view_members.php">👥 View Members</a>
    <a href="add_trainer.php">👨‍🏫 Add Trainer</a>
    <a href="view_trainers.php">📋 View Trainers</a>
    <a href="plan.php">📦 Add Plan</a>
    <a href="view_plan.php">🗂 View Plans</a>
    <a href="attendance.php">🕒 Mark Attendance</a>
    <a href="view_attendance.php">📅 View Attendance</a>
    <a href="payments.php">💳 Payments</a>
  </div>

  <footer>
    <p>💪 Designed by <strong>Suraj & Amna</strong> | DBMS Mini Project</p>
  </footer>

  <script>
    // live date-time display
    function updateTime() {
      const now = new Date();
      const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
      document.getElementById("datetime").innerText = now.toLocaleDateString('en-IN', options);
    }
    setInterval(updateTime, 1000);
    updateTime();
  </script>
</body>
</html>

