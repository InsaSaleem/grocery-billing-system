<?php
include 'db.php';  // Make sure this creates $conn using mysqli_connect()

$message = "";

// Predefined roles
$roles = ["Manager", "Cashier", "Stock Clerk", "Cleaner", "Sales Associate"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $role = htmlspecialchars($_POST["role"]);

    if (!empty($name) && in_array($role, $roles)) {
        $query = "INSERT INTO EMPLOYEE (Name, Role) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $name, $role);
            if (mysqli_stmt_execute($stmt)) {
                $message = "<p class='success'>✅ Employee added successfully!</p>";
            } else {
                $message = "<p class='error'>❌ Error: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = "<p class='error'>❌ Prepare failed: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
        }
    } else {
        $message = "<p class='error'>❌ Please enter a valid name and select a valid role.</p>";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Insert Employee</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(
          rgba(0, 0, 0, 0.6),
          rgba(0, 0, 0, 0.6)
        ),
        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1350&q=80')
          no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      color: #fff;
    }

    .container {
      background: rgba(25, 25, 25, 0.85);
      padding: 40px 35px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h1 {
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 2rem;
      color: #9b59b6;
      letter-spacing: 1px;
    }

    form input[type="text"],
    form select {
      width: 100%;
      padding: 12px 15px;
      margin: 12px 0;
      border-radius: 8px;
      border: none;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
      font-weight: 400;
    }

    form input[type="text"]:focus,
    form select:focus {
      box-shadow: 0 0 8px #9b59b6;
    }

    form input[type="submit"] {
      width: 100%;
      background: #9b59b6;
      border: none;
      color: white;
      padding: 14px;
      font-weight: 700;
      font-size: 1.1rem;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
      margin-top: 10px;
    }

    form input[type="submit"]:hover {
      background: #8e44ad;
    }

    .message {
      margin-top: 15px;
      font-size: 1rem;
    }

    .success {
      color: #90ee90;
      font-weight: 600;
    }

    .error {
      color: #ff6b6b;
      font-weight: 600;
    }

    a.back-link {
      display: inline-block;
      margin-top: 20px;
      color: #eee;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    a.back-link:hover {
      color: #9b59b6;
      text-decoration: underline;
    }

    @media (max-width: 450px) {
      .container {
        padding: 30px 25px;
      }

      h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="fas fa-user-tie"></i> Add New Employee</h1>

    <?php if (!empty($message)): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input
        type="text"
        name="name"
        placeholder="Employee Name"
        required
        autocomplete="off"
        maxlength="50"
      />
      <select name="role" required>
        <option value="" disabled selected>Select Role</option>
        <?php foreach ($roles as $r): ?>
          <option value="<?= htmlspecialchars($r) ?>"><?= htmlspecialchars($r) ?></option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Add Employee" />
    </form>

    <a href="All_tables.php" class="back-link">← Back to all tables</a>
  </div>
</body>
</html>
