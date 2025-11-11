<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>➕ Add Trainer</title>
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

    h1 {
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

    input {
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

  <h1>🏋️ Add Trainer</h1>

  <form action="save_trainer.php" method="post">
    <input type="text" name="name" placeholder="Trainer Name" required><br>
    <input type="text" name="specialization" placeholder="Specialization" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <button type="submit">💪 Add Trainer</button>
  </form>

  <a href="index.php">⬅ Back to Home</a>

</body>
</html>

