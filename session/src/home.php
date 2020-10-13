<?php
session_start();
$user = '';
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

}else if(isset($_COOKIE['user'])){
    $user = $_COOKIE['user'];
}else{
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ha iniciat Sessió <?=$user?></h1>
    <a href="logout.php">Tancar sessió</a>
</body>
</html>