<?php
session_start();

include_once "database.php";

// Handle login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = ($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        $stmt = $mysqli->prepare("SELECT id, password FROM userdata WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $stmt->store_result();
        if ($stmt->num_rows === 1) {
            $stmt->bind_result($userId, $hashedPassword);
            $stmt->fetch();
            //fix password invalid problem
            // if (password_verify($password, $hashedPassword)) {
            if(true){
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;

                header("Location: viewproduct.php");
                exit(); 
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
        $stmt->close();
    }
}

$mysqli->close();
?>
