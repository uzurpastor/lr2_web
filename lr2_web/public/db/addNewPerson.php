<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testdb";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $query = "INSERT INTO users (first_name, last_name, email, password, role_id) VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$_POST['password']}', '{$_POST['role_id']}')";
    mysqli_query($conn, $query);

    header("Location: ../index.php");
?>