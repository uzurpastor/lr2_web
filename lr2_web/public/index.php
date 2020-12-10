<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="../assets/css/table.css">
<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">
    <div class="container">
        <a href="index.php" class="logo">
            <img src="../assets/img/logo.png" width="220" height="300"
            alt="" style="position:absolute;top:0px;left:0px"/>
          </a>
        </div>
   </div>
</head>
<body>
<?php session_start(); ?>
<?php
if(array_key_exists("email", $_SESSION) && array_key_exists("role_id", $_SESSION)){
    if($_SESSION['role_id'] == 2){
        require_once('mainPages/User.php');
    }else if($_SESSION['role_id'] == 1){
        require_once('mainPages/Admin.php');
    }
}else{
    require_once('login_page.php');
}
?>
</body>

<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<script>
    $(document).ready(function(){   
        PopUpHide();
    });
    function PopUpShow(){
        $("#popUp").show();
    }
    function PopUpHide(){
        $("#popUp").hide();
    }
</script>
</html>