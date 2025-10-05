<?php
include 'db.php';

$sql = "
SELECT 
    b.BillID,
    b.BillDate,
    c.CustomerID,
    c.Name
FROM Customer c
RIGHT JOIN Bill b ON b.CustomerID = c.CustomerID
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers and Bills - RIGHT JOIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #8ca6db, #b993d6);
            padding: 30px;
        }
        .container {
            max-width: 950px;
            margin: auto;
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        h2 {
            color: #333;
            margin-bottom: 25px;
            text-align: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background-color: #374785;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 16px;
        }
        td {
            padding: 12px;
            font-size: 15px;
            color: #333;
            background-color: #ecf0f3;
        }
        tr:nth-child(even) td {
            background-color: #d6dde4;
        }
        tr:hover td {
            background-color: #c7d0db;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 16px;
            text-decoration: none;
            color: #374785;
            font-weight: bold;
            border: 2px solid #374785;
            border-radius: 8px;
            transition: 0.3s;
        }
        .back-link:hover {
            background-color: #374785;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-file-invoice-dollar"></i> All Customers with Bill Info (if available)</h2>

        <table>
            <tr>
                <th>Bill ID</th>
                <th>Bill Date</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlentities($row['BillID'] ?? 'N/A') ?></td>
                <td><?= htmlentities($row['BillDate'] ?? 'N/A') ?></td>
                <td><?= htmlentities($row['CustomerID'] ?? 'N/A') ?></td>
                <td><?= htmlentities($row['Name'] ?? 'N/A') ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <a href="joins.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Join Page</a>
    </div>

<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
</body>
</html>
