<?php

function schemaGeneratorMysql(PDO $db){
    $command = '
    CREATE TABLE IF NOT EXISTS movies(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        actor VARCHAR(100) NOT NULL,
        description VARCHAR(200) NOT NULL,
        year INTEGER(4) NOT NULL
    )';
    try{
        $db->exec($command);
    }catch(PDOException $e){
        die($e->getMessage());

    }
}
function Insertschema(PDO $db, array $data){
    if(is_array($data)){
        foreach($data as $row){
           
            //print_r();
                $command = "INSERT INTO movies(name,actor,description,year) VALUES('{$row['name']}','{$row['actor']}','{$row['description']}',{$row['year']})";

                try{
                    
                    $db->exec($command);
                    echo "inserts realizado ";
                }catch(PDOException $e){
                    die($e->getMessage());
            
                }
                    
            }
    }
}
    ?>