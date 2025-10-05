<?php
include 'db.php';

$sql = "
SELECT 
    c.CustomerID,
    c.Name AS CustomerName,
    b.BillID,
    b.BillDate,
    b.TotalAmount
FROM CUSTOMER c
LEFT JOIN BILL b ON c.CustomerID = b.CustomerID
ORDER BY c.CustomerID, b.BillDate
";

$result = $conn->query($sql);

$rows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Customers and Bills - LEFT JOIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
            padding: 40px;
            color: white;
        }
        .container {
            background: rgba(63, 25, 111, 0.36);
            border-radius: 20px;
            padding: 30px 40px;
            max-width: 1000px;
            margin: auto;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
        }
        h2 {
            margin-bottom: 15px;
            font-size: 1.8rem;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            color: #333;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: rgba(99, 35, 194, 0.2);
        }
        .no-data {
            font-weight: bold;
            color: #ffbaba;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            background: #a881ba;
            padding: 10px 20px;
            border-radius: 10px;
            transition: 0.3s;
        }
        .back-link:hover {
            background: #6c2ae8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-receipt"></i> All Customers and Their Bills (if any)</h2>

        <?php if (count($rows) == 0): ?>
            <p class="no-data">No customers found.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Bill ID</th>
                    <th>Bill Date</th>
                    <th>Total Amount</th>
                </tr>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['CustomerID']); ?></td>
                        <td><?php echo htmlspecialchars($row['CustomerName']); ?></td>
                        <td><?php echo htmlspecialchars($row['BillID'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($row['BillDate'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($row['TotalAmount'] ?? 'N/A'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <a href="joins.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Join Page</a>
    </div>
</body>
</html>
