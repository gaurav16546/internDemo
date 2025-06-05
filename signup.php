<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "database.php";

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    if(isDublicate($username)){
        echo "<script>
        alert('Dublicate entry not allowed');
        window.location.href ='signup.html';
        </script>";
        die();
    }
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


function isDublicate($username)
{
    $stmt = $GLOBALS['mysqli']->prepare("SELECT id FROM userdata WHERE username= ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    // if ($stmt->num_rows > 0) {
    //     $stmt->close();
    //     return true;
    // } else {
    //     $stmt->close();
    //     return false;
    // }
    $stmt->store_result();
    return $stmt->num_rows() > 0;
}




$mysqli->close();
