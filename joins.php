<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Join Queries</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
    }

    .container {
      background: rgba(37, 15, 64, 0.36);
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

    .link {
      display: block;
      background: #a881ba;
      color: #fff;
      padding: 14px;
      margin: 15px 0;
      border-radius: 10px;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
    }

    .link:hover {
      background: #6c2ae8;
      transform: translateY(-3px);
    }

    .link i {
      margin-right: 10px;
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
    <h1><i class="fas fa-code-branch"></i> Join Queries</h1>

    <a class="link" href="bill_detail_inner_join.php"><i class="fas fa-link"></i> Inner Join</a>
    <a class="link" href="bill_details_left.php"><i class="fas fa-arrow-left"></i> Left Join</a>
    <a class="link" href="bill_details_right.php"><i class="fas fa-arrow-right"></i> Right Join</a>
    <a class="link" href="index.html"><i class="fas fa-home"></i> Back to Home</a>
  </div>
</body>
</html>
