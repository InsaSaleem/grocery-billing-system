<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>All Tables</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

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

    ul {
      list-style: none;
      text-align: left;
    }

    li {
      margin: 15px 0;
    }

    a.link {
      display: block;
      background: #a881ba;
      color: #fff;
      padding: 14px;
      border-radius: 10px;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
      font-size: 1.1rem;
    }

    a.link:hover {
      background: #6c2ae8;
      transform: translateY(-3px);
    }

    a.link i {
      margin-right: 12px;
    }

    @media (max-width: 480px) {
      .container {
        padding: 25px;
      }
      h1 {
        font-size: 1.5rem;
      }
      a.link {
        font-size: 1rem;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
 <div class="container">
  <h1><i class="fas fa-table"></i> All Tables</h1>
  <ul>
    <li><a class="link" href="view_table.php?table=CUSTOMER"><i class="fas fa-user"></i> Customers</a></li>
    <li><a class="link" href="view_table.php?table=PRODUCT"><i class="fas fa-boxes"></i> Products</a></li>
    <li><a class="link" href="view_table.php?table=EMPLOYEE"><i class="fas fa-user-tie"></i> Employees</a></li>
    <li><a class="link" href="view_table.php?table=BILL"><i class="fas fa-file-invoice-dollar"></i> Bills</a></li>
    <li><a class="link" href="view_table.php?table=BILL_ITEM"><i class="fas fa-list"></i> Bill Items</a></li>
    <li><a class="link" href="view_table.php?table=CATEGORY"><i class="fas fa-tags"></i> Categories</a></li>
    <li><a class="link" href="view_table.php?table=PAYMENT"><i class="fas fa-credit-card"></i> Payments</a></li>
  </ul>
  
 <a href="index.html" style="color: white; text-decoration: none;">← Back to Home</a>

</div>

</body>
</html>
