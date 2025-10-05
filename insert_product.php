<?php
include 'db.php';

$message = "";

// Product name to category ID mapping
$productCategories = [
    "Shampoo" => 1,
    "Rice" => 2,
    "Soap" => 1,
    "Milk" => 3,
    "Bread" => 3,
    "Toothpaste" => 1,
    "Sugar" => 2
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $price = floatval($_POST["price"]);
    $stock = intval($_POST["stock"]);

    $categoryid = $productCategories[$name] ?? null;

    if ($categoryid === null) {
        $message = "<p style='color: #ff7f7f;'>❌ Error: Invalid product name or category not assigned.</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO PRODUCT (Name, Price, Stock, CategoryID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdii", $name, $price, $stock, $categoryid);

        if ($stmt->execute()) {
            $message = "<p style='color: #90ee90;'>✅ Product added successfully!</p>";
        } else {
            $message = "<p style='color: #ff7f7f;'>❌ Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Insert Product</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(rgba(127, 111, 111, 0.7), rgba(161, 161, 161, 0.11)),
                  url('https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77700344358.jpg');
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: white;
    }

    .container {
      background: rgba(64, 25, 111, 0.71);
      border-radius: 20px;
      padding: 40px;
      max-width: 450px;
      width: 90%;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 25px rgba(255, 255, 255, 0.55);
      text-align: center;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 25px;
    }

    form input[type="number"],
    form select,
    form input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 10px;
      border: none;
      font-size: 1rem;
    }

    form input[type="submit"] {
      background: #a881ba;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
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
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="fas fa-box"></i> Insert Product</h1>

    <?php if (!empty($message)): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <select name="name" required>
        <option value="">Select Product</option>
        <?php foreach ($productCategories as $prod => $catid): ?>
          <option value="<?= htmlspecialchars($prod) ?>"><?= htmlspecialchars($prod) ?></option>
        <?php endforeach; ?>
      </select>
      <input type="number" step="0.01" name="price" placeholder="Price" required />
      <input type="number" name="stock" placeholder="Stock" required />
      <input type="submit" value="Add Product" />
    </form>

    <a href="All_tables.php" class="back-link">← Back to all tables</a>
  </div>
</body>
</html>
