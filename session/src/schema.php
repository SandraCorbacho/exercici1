<?php
function schemaGenerator(PDO $db){
    $command = '
    CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre VARCHA(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        lastlogin VARCHAR(100) NOT NULL
    )';
    try{
        $db->exec($command);
    }catch(PDOException $e){
        die($e->getMessage());

    }
}
function insertDataSchema(PDO $db){
    $date = date('Y/m/d') .' '. date('h:i:sa');
    
    $command = "UPDATE users set lastLogin  = '$date';";

    try{
        
        $db->exec($command);
        
    }catch(PDOException $e){
        die($e->getMessage());

    }
}
function readData(PDO $db, $nameuser){
    $command = "SELECT * FROM users where nombre = :name;";
    try{
        $stmt = $db->prepare($command);
        //si ponemos un where
        $stmt->execute([':name'=>$nameuser]);
        //$stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                        
           
            return $data;
    }
    
        
    catch(PDOException $e){
        die($e->getMessage());

    }
}
function Insertschema(PDO $db, array $data){
    if(is_array($data)){
        $date = date('Y/m/d') .' '. date('h:i:sa');
    
                $command = "INSERT INTO users(nombre, password,lastlogin) VALUES('{$data['nombre']}','{$data['password']}','{$date}');";

                try{
                    
                    $db->exec($command);
                    
                }catch(PDOException $e){
                    die($e->getMessage());
            
                }
                    
            }
    
}
function searchSchema($base,$name, $pass){
    $sql = "SELECT * FROM users where nombre=:name and password = :pass";
    //$sql = "SELECT * FROM users";
    $stmt = $base->prepare($sql);
    //si ponemos un where
    $stmt->execute([':name'=>$name,':pass'=>$pass]);
    //$stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($data)>0){
        return true;
    }else{
        return false;
    }
}