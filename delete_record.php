<?php
include 'db.php';

$table = isset($_GET['table']) ? strtoupper($_GET['table']) : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Allowed tables to avoid SQL injection on table names
$allowedTables = ['CUSTOMER', 'PRODUCT', 'EMPLOYEE', 'BILL', 'BILL_ITEM', 'CATEGORY', 'PAYMENT'];
if (!in_array($table, $allowedTables)) {
    die("❌ Invalid table selected.");
}

// Get the primary key column name (assumed to be the first column)
$result = $conn->query("SHOW COLUMNS FROM `$table`");
if (!$result) {
    die("❌ Unable to fetch columns for table $table");
}
$firstColumn = $result->fetch_assoc();
$primaryKey = $firstColumn['Field'];

// Prepare DELETE query with prepared statements
$stmt = $conn->prepare("DELETE FROM `$table` WHERE `$primaryKey` = ?");
if (!$stmt) {
    die("❌ Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind the id parameter, assuming id is string, use "i" if integer
$stmt->bind_param("s", $id);

// Execute and output result
echo "<!DOCTYPE html>
<html>
<head>
  <title>Delete Record</title>
  <link rel='stylesheet' href='style.css'>
</head>
<body>
";

if ($stmt->execute()) {
    echo "<p style='color:green;'>✅ Record deleted successfully.</p>";
} else {
    echo "<p style='color:red;'>❌ Error deleting record: " . htmlspecialchars($stmt->error) . "</p>";
}

echo "<a href='view_table.php?table=$table'>← Back to $table</a>
</body>
</html>";

$stmt->close();
$conn->close();
?>
