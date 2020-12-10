<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['role_id']);
    header("Location: index.php");
?>