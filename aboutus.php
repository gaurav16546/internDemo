<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f2f2f2;
      color: #333;
    }

    header {
      background-color: #0d8b8b;
      padding: 20px 40px;
      color: white;
      text-align: center;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    h1 {
      color: #0d8b8b;
      margin-bottom: 20px;
    }

    p {
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .team-section {
      margin-top: 40px;
    }

    .team-member {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .team-member img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 15px;
      object-fit: cover;
    }

    .team-member h4 {
      margin: 0;
      font-size: 18px;
      color: #0d8b8b;
    }

    .team-member span {
      font-size: 14px;
      color: #777;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #0d8b8b;
      color: white;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- <header>
    <h2>About Us</h2>
  </header> -->
  <?php
    include_once "header.php";
    ?>
  <div class="container">
    <h1>Welcome to Our E-Commerce Platform</h1>
    <p>We are passionate about making online shopping simple, enjoyable, and efficient. Our mission is to provide high-quality products at affordable prices, along with a seamless user experience.</p>
    <p>Started by a team of developers and designers who love tech and retail, we aim to bridge the gap between small businesses and online customers by offering a smooth platform that everyone can use easily.</p>

    <div class="team-section">
      <h2>Meet the Team</h2>
      <div class="team-member">
        <img src="#" alt="Team Member 1">
        <div>
          <h4>John1</h4>
          <span>Founder & Backend Developer</span>
        </div>
      </div>
      <div class="team-member">
        <img src="#" alt="Team Member 2">
        <div>
          <h4>John2</h4>
          <span>UI/UX Designer</span>
        </div>
      </div>
    </div>
  </div>

  

</body>
</html>
