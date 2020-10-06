<?php
//mostrar errores
ini_set('display_errors','On');
require __DIR__.'/src/connect.php';
require __DIR__.'/src/database/schema.php';
//conexion
$dbname = 'movies';
$userdb = 'root';
$passdb = 'linuxlinux';
$base = connectMySQL($dbname, $userdb, $passdb);
//schema
//schemaGenerator($base);
//$data = [["nombre" => "Lola", "email" => "lola@hotmaiklcom"],["nombre" => "Ruben", "email" => "ññññ"]];

//schemaGeneratorMySql($base);
//$data = [
//    ["name" => 'Indiana Jones', 'actor' => 'Harrison Ford', 'description'=>'Pelicula Aventuras Profesor de Arquelogia', 'year' => '1987'],
//    ["name" => 'IronMan', 'actor' => 'Jr.Downey', 'description'=>'Pelicula Aventuras Superheroes', 'year' => '2017'],
//    ["name" => 'Harry Potter', 'actor' => 'Daniel Radcliffe', 'description'=>'Pelicula Magia', 'year' => '2005'],
//];
//Insertschema($base, $data);
//con where
//$sql = "SELECT * FROM users where id=:id";
//$sql = "SELECT * FROM users";
//$stmt = $base->prepare($sql);
//si ponemos un where
//$stmt->execute([':id'=>1]);
//$stmt->execute();
//$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


//$actor = $_GET['actor'];
//$year = $_GET['year'];






if(isset($_GET['actor'])&& isset($_GET['nameMovie'])){
    $actor = $_GET['actor'];
    $actor = str_replace($actor,' ','%');
    $name = $_GET['nameMovie'];
    $sql = "SELECT * FROM movies where actor=:actor and name=:nameMovie";
    $stmt = $base->prepare($sql);
    $stmt->execute([':actor'=>$actor , ':nameMovie'=>$name]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}else if(isset($_GET['actor'])){
    $actor = $_GET['actor'];
    $actor = str_replace($actor,' ','%');
    $sql = "SELECT * FROM movies where actor=:actor";
    $stmt = $base->prepare($sql);
    $stmt->execute([':actor'=>$actor]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}else if(isset($_GET['nameMovie'])){
    
    $name = $_GET['nameMovie'];
    $name = str_replace($name,'%',' ');
    echo $name;
    $sql = "SELECT * FROM movies where name=:name";
    $stmt = $base->prepare($sql);
    $stmt->execute([':name'=>$name]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<?php 
if(isset($data)){
    foreach($data as $film){
        echo "<h1>Titulo: ".$film['name']."</h1>";
        echo "<p>Actor: ".$film['actor']."</p>";
        echo "<p>Descripcion: ".$film['description']."</p>";
        echo "<p>Año: ".$film['year']."</p>";
    }
}
    
  ?>
</body>
</html>