<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Sales and Category Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            color: #333;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #ffffffcc;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #1f3c88;
            margin-bottom: 10px;
            font-size: 24px;
        }

        p {
            margin-bottom: 20px;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #1f3c88;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #e3f2fd;
        }

        tr:hover {
            background-color: #d1eaff;
            transition: 0.3s;
        }

        .no-data {
            font-style: italic;
            color: #b71c1c;
            background-color: #ffe0e0;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        hr {
            margin: 40px 0;
            border: none;
            height: 2px;
            background-color: #1f3c88;
            border-radius: 5px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #1f3c88;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #3454d1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>✅ All Sold Products with Category</h2>
        <p>🟢 CONDITION 1: Display all products that have been sold with their category and quantity sold.</p>

        <?php
        $sql1 = "
        SELECT 
            p.ProductID,
            p.Name AS ProductName,
            c.CategoryName,
            SUM(bi.Quantity) AS TotalQuantitySold
        FROM PRODUCT p
        INNER JOIN CATEGORY c ON p.CategoryID = c.CategoryID
        INNER JOIN BILL_ITEM bi ON p.ProductID = bi.ProductID
        GROUP BY p.ProductID, p.Name, c.CategoryName
        ORDER BY TotalQuantitySold DESC
        ";

        $result1 = mysqli_query($conn, $sql1);
        ?>

        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Total Quantity Sold</th>
            </tr>

            <?php
            $found1 = false;
            if ($result1 && mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    $found1 = true;
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['ProductID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CategoryName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TotalQuantitySold']) . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

            if (!$found1) {
                echo "<p class='no-data'>No products have been sold yet.</p>";
            }
            ?>

        <hr>

        <h2>❌ Products Sold in 'Makeup' Category (No Results Expected)</h2>
        <p>🔴 CONDITION 2: Display products sold in a category that likely doesn't exist, like 'Makeup', to show the no-result case.</p>

        <?php
        $sql2 = "
        SELECT 
            p.ProductID,
            p.Name AS ProductName,
            c.CategoryName,
            SUM(bi.Quantity) AS TotalQuantitySold
        FROM PRODUCT p
        INNER JOIN CATEGORY c ON p.CategoryID = c.CategoryID
        INNER JOIN BILL_ITEM bi ON p.ProductID = bi.ProductID
        WHERE c.CategoryName = 'Makeup'
        GROUP BY p.ProductID, p.Name, c.CategoryName
        ORDER BY TotalQuantitySold DESC
        ";

        $result2 = mysqli_query($conn, $sql2);
        ?>

        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Total Quantity Sold</th>
            </tr>

            <?php
            $found2 = false;
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    $found2 = true;
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['ProductID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CategoryName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TotalQuantitySold']) . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

            if (!$found2) {
                echo "<p class='no-data'>No products found in the 'Makeup' category.</p>";
            }

            mysqli_close($conn);
            ?>

        <a href="joins.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Join Page</a>
    </div>
</body>
</html>
