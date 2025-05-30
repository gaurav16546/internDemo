<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Header</title>
  <style>
   .navbar {
  position: fixed; /* Keep it always at the top */
  top: 0;
  left: 0;
  width: 95%; /* Full width */
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #0d8b8b;
  padding: 10px 20px;
  color: white;
  z-index: 1000; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
}

.navbar .logo {
  color: white;
  font-weight: bold;
  text-decoration: none;
  font-size: 20px;
}

.navbar ul {
  list-style: none;
  display: flex;
  gap: 20px;
  margin: 0;
}

.navbar ul li a {
  text-decoration: none;
  color: white;
  font-weight: 500;
}

.logout-btn {
  padding: 8px 16px;
  background-color: #e63946;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 500;
}

.logout-btn:hover {
  background-color: #c62828;
}

  </style>
</head>
<body>

<div class="navbar">
  <a href="viewproduct.php" class="logo">MyShop</a>
  <ul>
    <li><a href="viewproduct.php">Home</a></li>
    <li><a href="viewcart.php">Cart</a></li>
    <li><a href="aboutus.php">About Us</a></li>
  </ul>
  <form action="logout.php" method="POST" style="margin-left:auto;">
    <button type="submit" class="logout-btn">Logout</button>
  </form>
</div>


</body>
</html>
