<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login | Gym Management System</title>
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
      color: #0ff;
      margin-bottom: 20px;
    }
    form {
      background: #222;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,255,255,0.3);
      width: 300px;
      text-align: center;
    }
    input {
      width: 90%;
      margin: 10px 0;
      padding: 10px;
      border-radius: 5px;
      border: none;
    }
    button {
      width: 95%;
      background: #0ff;
      color: #000;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    button:hover {
      background: #0cc;
    }
    p {
      color: #888;
      margin-top: 10px;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <h1>🏋️ Admin Login</h1>
  <form action="authenticate.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <p>Gym Management System | Secure Access</p>
</body>
</html>
