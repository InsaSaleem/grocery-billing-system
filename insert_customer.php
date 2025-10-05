<?php
include 'db.php'; // MySQL DB connection

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));

    // Insert query without Oracle sequence (MySQL auto_increment handles ID)
    $query = "INSERT INTO CUSTOMER (Name, Phone) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $phone);
        if (mysqli_stmt_execute($stmt)) {
            $message = "<p style='color: #90ee90;'>✅ Customer registered successfully!</p>";
        } else {
            $message = "<p style='color: #ff7f7f;'>❌ Error: " . mysqli_stmt_error($stmt) . "</p>";
        }
        mysqli_stmt_close($stmt);
    } else {
        $message = "<p style='color: #ff7f7f;'>❌ Error preparing statement: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Insert Customer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(rgba(127, 111, 111, 0.7), rgba(161, 161, 161, 0.11)),
                  url('https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77700344358.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
      color: white;
    }

    .container {
      background: rgba(64, 25, 111, 0.71);
      border-radius: 20px;
      padding: 40px;
      max-width: 420px;
      width: 90%;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 10px 25px rgba(255, 255, 255, 0.55);
      text-align: center;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 25px;
      color: #ffffff;
    }

    form input[type="text"],
    form input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 10px;
      border: none;
      font-size: 1rem;
    }

    form input[type="text"] {
      background: #fff;
      color: #333;
    }

    form input[type="submit"] {
      background: #a881ba;
      color: white;
      font-weight: bold;
      transition: 0.3s;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background: #6c2ae8;
      transform: translateY(-2px);
    }

    .message {
      margin-top: 15px;
      font-size: 1rem;
    }

    a.back-link {
      display: inline-block;
      margin-top: 20px;
      color: white;
      text-decoration: none;
    }

    a.back-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .container {
        padding: 25px;
      }
      h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="fas fa-user-plus"></i> Insert Customer</h1>

    <?php if (!empty($message)): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="name" placeholder="Customer Name" required />
      <input type="text" name="phone" placeholder="Phone Number" required />
      <input type="submit" value="Register Customer" />
    </form>

    <a href="index.html" class="back-link">← Back to Home</a>
  </div>
</body>
</html>
