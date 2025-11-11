<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🕒 Mark Attendance</title>
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

    input[type="submit"] {
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

    input[type="submit"]:hover {
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

  <h2>🕒 Mark Attendance</h2>

  <form action="add_attendance.php" method="POST">
    <input type="number" name="member_id" placeholder="Enter Member ID" required><br>
    <input type="date" name="attendance_date" required><br>
    <select name="status" required>
      <option value="" disabled selected>Select Status</option>
      <option value="Present">Present</option>
      <option value="Absent">Absent</option>
    </select><br>
    <input type="submit" value="✅ Mark Attendance">
  </form>

  <a href="index.php">⬅ Back to Home</a>

</body>
</html>

