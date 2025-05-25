<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    min-height: 100vh;
}

form {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    padding: 30px;
    box-sizing: border-box;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

label {
    display: block;
    font-size: 16px;
    color: #555;
    margin-bottom: 8px;
    margin-top: 15px;
}

input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

input[type="file"] {
    padding: 6px;
}

button {
    background-color: #4CAF50;
    color: white;
    font-size: 18px;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    margin-top: 15px;
}

button:hover {
    background-color: #45a049;
}

button:active {
    background-color: #3e8e41;
}

.center-content {
    width: 100%;
    text-align: center;
    margin-top: 20px;
}

.upload-link {
    padding: 12px 20px;
    background-color: #1e90ff;
    color: white;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
    text-align: center;
    display: inline-block;
    width: auto;
}

.upload-link:hover {
    background-color: #1c86e6;
}

.upload-link:active {
    background-color: #187bcd;
}

    </style>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="productname" id="productname" required>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Upload</button>


    </form>
    <div class="center-content">
            <a href="viewproduct.php" class="upload-link">View Products</a>
        </div>
</body>

</html>