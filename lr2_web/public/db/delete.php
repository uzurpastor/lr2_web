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

    $queryCheck = "SELECT id FROM users WHERE email = '{$_SESSION['email']}'";
    $resultCheck = mysqli_query($conn, $queryCheck);
    $rowCheck = mysqli_fetch_array($resultCheck);

    if($rowCheck['id'] == $_POST['id']){
        unset($_SESSION['email']);
        unset($_SESSION['role_id']);
    }
    $queryDelete = "DELETE FROM users WHERE id = '{$_POST['id']}'";
    mysqli_query($conn, $queryDelete);

    header("Location: ../index.php");