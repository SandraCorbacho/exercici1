<?php

ini_set('display_errors','On');
session_start();
require __DIR__.'/src/conexio.php';
require __DIR__.'/src/schema.php';
//conexion
$dbname = 'act1';
$userdb = 'prova';
$passdb = 'linuxlinux';
$base = connectSqlite($dbname);

if(isset($_POST['contrasena2'])){
    if($_POST['contrasena'] == $_POST['contrasena2']){
        
        $data = [
            'nombre' => $_POST['usuario'],
            'password' => $_POST['contrasena']
        ];
        if(Insertschema($base, $data)){
            echo('usuario registrado con éxito');
        };
    }
   
}
if(isset($_SESSION['user'])||isset($_COOKIE['user']['nombre'])&& $_COOKIE['user']['nombre'] != ""){
    header('Location: src/home.php');
}
if(isset($_POST['token'])){
    if(searchSchema($base,$_POST['usuario'], $_POST['contrasena'])){
        insertDataSchema($base);
        if($_POST['recorda']){
            $user = readData($base, $_POST['usuario']);
        
            setcookie("id", $user[0]['id'], time() + (86400 * 30), "/");
            setcookie("nombre", $user[0]['nombre'], time() + (86400 * 30), "/");
            setcookie("password", $user[0]['password'], time() + (86400 * 30), "/");
            setcookie("lastlogin", $user[0]['lastlogin'], time() + (86400 * 30), "/");
            
        }
       $_SESSION['user'] = $_POST['usuario'];
       header('Location: src/home.php');
    };
}

schemaGenerator($base);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inici de sessió</h1>
    <form action=<?= htmlentities($_SERVER['PHP_SELF']);?> method = 'POST' >
    <input type="_token" name='token' style='display:none'>
        <label> Nom d'usuari:</label>
        <input type="text" name='usuario' required><br>
        <label> Contraseña:</label>
        <input type="text" name='contrasena' required><br>
        <label> Recorda'm:</label>
        <input type="checkbox" name='recorda'>
        <input type="submit">
        <a href="register.php">Registrar-se</a>
    </form>
</body>
</html>