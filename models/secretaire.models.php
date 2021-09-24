<?php

// Les rendezvous 


function find_all_rendez_vous():array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , type_medecin t 
    where 
    r.id_type_medecin=t.id_type_medecin
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $rendezvous= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $rendezvous ;
}




function find_all_rendez_vous_secretaire_by_date_by_etat_type($etat_rendezvous ,$type_rendezvous ,$date):array{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_rendezvous , $type_rendezvous);

    $sql="select * from rendezvous r 
        where
        r.etat_rendezvous like ? 
         and
        r.type_rendezvous like ? 
        ";
       if (!empty($date)) {
          $sql .= ' and date_rendezvous like ?';
         $params[]=$date;
       }

        if ($type_rendezvous == 'consultation') {

            $sql="select * from rendezvous r , type_medecin t
            where
            r.id_type_medecin=t.id_type_medecin
            and
            r.etat_rendezvous like ? 
            and
            r.type_rendezvous like ? 
            ";
          $params=array($etat_rendezvous , 'consultation');
            if (!empty($date)) {
                $sql .= ' and date_rendezvous like ?';
                $params[]=$date;
            }
        }

    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $reservation = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $reservation ;
   
}














































?>