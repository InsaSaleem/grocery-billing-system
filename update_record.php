<?php
include 'db.php';

$table = isset($_GET['table']) ? strtoupper($_GET['table']) : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$allowedTables = ['CUSTOMER', 'PRODUCT', 'EMPLOYEE', 'BILL', 'BILL_ITEM', 'CATEGORY', 'PAYMENT'];
if (!in_array($table, $allowedTables)) {
    die("❌ Invalid table selected.");
}

// Get primary key (assume first column)
$result = $conn->query("SHOW COLUMNS FROM `$table`");
$primaryKey = $result->fetch_assoc()['Field'];

// Fetch current row
$stmt = $conn->prepare("SELECT * FROM `$table` WHERE `$primaryKey` = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "❌ Record not found.";
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update <?php echo htmlspecialchars($table); ?></title>
    <link rel='stylesheet' href='style.css'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(185, 57, 57);
            margin: 40px;
        }
        .container {
            background-color: #fff;
            padding: 25px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(252, 233, 233, 0.97);
            max-width: 600px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        input[type='text'] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        input[readonly] {
            background-color:rgb(215, 179, 179);
        }
        input[type='submit'] {
            margin-top: 20px;
            padding: 12px 20px;
            background-color:rgb(77, 25, 99);
            border: none;
            color: white;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .message {
            margin-top: 20px;
            text-align: center;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color:rgb(77, 9, 86);
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class='container'>
    <h2>Update Record in <?php echo htmlspecialchars($table); ?></h2>
    <form method='POST'>
        <?php
        foreach ($row as $col => $val) {
            $safeVal = htmlspecialchars($val ?? '', ENT_QUOTES);
            $readonly = ($col == $primaryKey) ? "readonly" : "";
            echo "<label>$col:</label><input type='text' name='$col' value='$safeVal' $readonly>";
        }
        ?>
        <input type='submit' name='update' value='Update'>
    </form>

<?php
if (isset($_POST['update'])) {
    $setParts = [];
    $params = [];
    $types = '';

    foreach ($_POST as $col => $val) {
        if ($col !== $primaryKey && $col !== 'update') {
            $setParts[] = "`$col` = ?";
            $params[] = $val;
            $types .= 's'; // assuming string; change as needed
        }
    }

    $params[] = $id;
    $types .= 's';

    $sql = "UPDATE `$table` SET " . implode(', ', $setParts) . " WHERE `$primaryKey` = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param($types, ...$params);

    echo "<div class='message'>";
    if ($stmt->execute()) {
        echo "<p style='color:green;'>✅ Record updated successfully.</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . htmlspecialchars($stmt->error) . "</p>";
    }
    $stmt->close();
    echo "<a href='view_table.php?table=$table'>← Back to $table</a></div>";
}
$conn->close();
?>
</div>
</body>
</html>
