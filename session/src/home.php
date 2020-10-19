<?php
session_start();
$user = '';
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

}else if(isset($_COOKIE['password'])){
    $user = $_COOKIE['nombre'];
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
    <?php
    if(isset($_COOKIE['lastlogin'])){
        $hora = substr($_COOKIE['lastlogin'],10 ,strlen($_COOKIE['lastlogin']));
        $dia = substr($_COOKIE['lastlogin'],0,10);
        echo "<p>Última hora de conexió: ".$hora." en la data: ".$dia .". </p>";
    }
    ?>
    <a href="perfil.php">Perfil d'usuari</a>
    <a href="logout.php">Tancar sessió</a>

    <br><br><a href='/M8/Exercici1'>Tornar al menú</a>
</body>
</html>