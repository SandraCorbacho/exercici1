<?php

ini_set('display_errors','On');
require __DIR__.'/src/conexio.php';
//require __DIR__.'/src/schema.php';
//conexion
$dbname = 'act1';
$userdb = 'prova';
$passdb = 'linuxlinux';
$base = connectSqlite($dbname);

//schema
//schemaGenerator($base);
//$data = [["nombre" => "Lola", "email" => "lola@hotmaiklcom"],["nombre" => "Ruben", "email" => "ññññ"]];

//schemaGeneratorMySql($base);
//die;
//Insertschema($base, $data);
//con where
//$sql = "SELECT * FROM users where name= ";
//$sql = "SELECT * FROM users";
//$stmt = $base->prepare($sql);
//si ponemos un where
//$stmt->execute([':id'=>1]);
//$stmt->execute();
//$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <form action='index.php' method = 'POST' >
        <label> Nom d'usuari:</label>
        <input type="text" name='usuario' required><br>
        <label> Contraseña:</label>
        <input type="text" name='contrasena' required><br>
        <label> Contraseña:</label>
        <input type="text" name='contrasena2' required><br>
        <input type="submit">
        
    </form>
</body>
</html>