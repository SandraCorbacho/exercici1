<?php
function connectSqlite(String $bdName){
    try{
        //primero decimos el driver
        $db = new PDO('sqlite:'.__DIR__.'/database/'.$bdName. '.sqlite');
        //como tratamos los errores de la base de datos
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    }catch(PDOException $e){
        echo $e->getMessage();
        die;
    }
    return $db;
    
}