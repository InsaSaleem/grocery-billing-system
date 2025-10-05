<?php
include 'db.php';

$table = isset($_GET['table']) ? strtoupper($_GET['table']) : 'CUSTOMER';

$allowedTables = ['CUSTOMER', 'PRODUCT', 'EMPLOYEE', 'BILL', 'BILL_ITEM', 'CATEGORY', 'PAYMENT'];
if (!in_array($table, $allowedTables)) {
    die("❌ Invalid table selected.");
}

// Define primary key or sorting column per table
$sortColumns = [
    'CUSTOMER'  => 'CUSTOMERID',
    'PRODUCT'   => 'PRODUCTID',
    'EMPLOYEE'  => 'EMPLOYEEID',
    'BILL'      => 'BILLID',
    'BILL_ITEM' => 'BILLID',
    'CATEGORY'  => 'CATEGORYID',
    'PAYMENT'   => 'PAYMENTID'
];

$sortColumn = isset($sortColumns[$table]) ? $sortColumns[$table] : null;

$query = $sortColumn ? "SELECT * FROM $table ORDER BY $sortColumn ASC" : "SELECT * FROM $table";

$result = mysqli_query($conn, $query);
if (!$result) {
    die("❌ Query failed: " . mysqli_error($conn));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>$table Table</title>
  <link rel='stylesheet' href='style.css'>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(rgba(127, 111, 111, 0.7), rgba(161, 161, 161, 0.11)),
                  url('https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77700344358.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px;
      color: white;
    }
    .container {
      background: rgba(63, 25, 111, 0.36);
      border-radius: 20px;
      padding: 40px;
      max-width: 420px;
      width: 90%;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 10px 25px rgba(255, 255, 255, 0.55);
      text-align: center;
    }
    h2 {
      text-align: center;
      color: white;
      margin-bottom: 20px;
    }
    a.back-link, a.back-to-all, a.insert-btn {
      color: white;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
      margin: 20px 10px;
      padding: 10px 20px;
      border: 2px solid white;
      border-radius: 8px;
      transition: background-color 0.3s, color 0.3s;
    }
    a.back-link:hover, a.back-to-all:hover, a.insert-btn:hover {
      background-color: white;
      color: #041367;
      text-decoration: none;
    }
    table {
      width: 100%;
      max-width: 900px;
      border-collapse: collapse;
      background: #fff;
      color: black;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: rgba(15, 36, 175, 0.3);
    }
    a.btn {
      padding: 6px 10px;
      margin-right: 5px;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 0.9rem;
    }
    a.btn.delete {
      background-color: #e74c3c;
    }
    @media (max-width: 600px) {
      table {
        font-size: 0.85rem;
      }
      a.btn {
        font-size: 0.8rem;
        padding: 5px 8px;
      }
      a.back-link, a.back-to-all, a.insert-btn {
        font-size: 0.9rem;
        padding: 8px 15px;
      }
    }
  </style>
</head>
<body>
  <h2>$table Table</h2>
  <a href='index.html' class='back-link'>← Back to Home</a>
";

// Show insert button if allowed
if (in_array($table, ['CATEGORY', 'PRODUCT', 'EMPLOYEE'])) {
    echo "<a href='insert_" . strtolower($table) . ".php' class='insert-btn'>➕ Insert New Record</a>";
}

echo "<a href='All_tables.php' class='back-to-all'>← Back to All Tables</a><br><br>";

// Display table
echo "<table><tr>";

// Print column headers
$fields = mysqli_fetch_fields($result);
foreach ($fields as $field) {
    echo "<th>" . htmlspecialchars($field->name) . "</th>";
}
echo "<th>Actions</th></tr>";

// Print rows
mysqli_data_seek($result, 0); // Reset result pointer
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value ?? "&nbsp;") . "</td>";
    }
    $id = reset($row); // Get first column as primary key
    echo "<td>
        <a href='update_record.php?table=$table&id=$id' class='btn'>Edit</a>
        <a href='delete_record.php?table=$table&id=$id' class='btn delete' onclick=\"return confirm('Are you sure?');\">Delete</a>
    </td></tr>";
}

echo "</table>
</body>
</html>";

mysqli_free_result($result);
mysqli_close($conn);
?>
