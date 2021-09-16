<?php
function ouvrir_connection_bd():PDO{

    try{    
        $options=[
         PDO::ATTR_CASE=>PDO::CASE_LOWER,
         PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
        ];
         $pdo = new PDO(CHAINE_DE_CONNECTION, USER_BD, PASSWORD_BD, $options);
         return $pdo;
     }catch (PDOException $e){
          die ($e->getMessage());
     }
 }
 
 
 function fermer_connection_bd(PDO $pdo){
     $pdo = null;
 }







?>