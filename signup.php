<?php
include_once "database.php";

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Hashing password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into userdata table
    $sql = "INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            echo "<script>
                    alert('Sign up successful!');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "<script>alert('Error: Could not save data.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error: Could not prepare statement.');</script>";
    }

}

$mysqli->close();
?>
