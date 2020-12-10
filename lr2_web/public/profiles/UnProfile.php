<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testdb";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $queryUser = "SELECT first_name, last_name, email, role_id, photo FROM users WHERE id = '{$_GET['id']}'";
    $resultUser = mysqli_query($conn, $queryUser);
    $user = mysqli_fetch_array($resultUser);

    $queryRole = "SELECT title FROM roles WHERE id = '{$user['role_id']}'";
    $resultRole = mysqli_query($conn, $queryRole);
    $role = mysqli_fetch_array($resultRole);
?>

<div class="text-center">
    <div class="Center">
        <div class="img-group">
            <?php
                if($user['photo'] == ''){
                    echo '<img src="../../assets/img/default-user-icon.jpg" alt="" width="170" height="170">';
                }else{
                    if(file_exists("../images /{$user['photo']}")){
                        echo '<img src="../images/' .$user['photo']. '" alt="" width="170" height="170">';
                    }else{
                        echo '<img src="../../assets/img/default-user-icon.jpg" alt="" width="170" height="170">';
                    }
                }
            ?> 
    </div>
    
    <form action="">
        <div class="form-group">
            <?php
                echo '<input type="text" class="form-control" name="first_name" value="' .$user['first_name']. '" readonly>';
            ?>
        </div>
        <div class="form-group">
            <?php
                echo '<input type="text" class="form-control" name="last_name" value="' .$user['last_name']. '" readonly>';
            ?>
        </div>
        <div class="form-group">
            <?php
                echo '<input type="email" class="form-control" name="email" value="' .$user['email']. '" readonly>';
            ?>
        </div>
        <div class="form-group">
            <?php
                echo '<input type="text" class="form-control" name="role_title" value="' .$role['title']. '" readonly>';
            ?>
        </div>
    </form>
    <button class="btn btn-secondary" onClick = "document.location='../index.php'">TO MAIN PAGE</button>
    </div>
</div>