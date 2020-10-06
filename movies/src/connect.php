
<?php

function connectMysql(string $dbname, string $dbuser, string $dbpass){
    try{
   
        $db = new PDO('mysql:host=127.0.0.1;dbname='.$dbname .';charset=utf8mb4', $dbuser, $dbpass);
        
        //como tratamos los errores de la base de datos
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    }catch(PDOException $e){
        echo $e->getMessage();
        die;
    }
    return $db;
}

?>