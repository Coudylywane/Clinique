<?php

function find_all_rendez_vous_by_patient(int $id_patient):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , user u 
    where 
        u.id_user=r.id_patient
        and 
        r.id_patient=? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_patient]);
    $rendezvouss = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $rendezvouss ;
}


function find_all_consultation_by_patient(int $id_patient):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , rendezvous r
     where r.id_rendezvous=c.id_rendezvous 
    and r.id_patient= ?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_patient]);
    $consultations= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $consultations ;
}


function find_all_prestation_by_patient(int $id_patient):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation p , rendezvous r
     where r.id_rendezvous=p.id_rendezvous 
    and r.id_patient= ?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_patient]);
    $prestations= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}



function find_all_rendez_vous_by_date_by_etat_type($id_patient,$etat_rendezvous ,$type_rendezvous ,$date):array{
    $pdo=ouvrir_connection_bd();
    $params=array($id_patient,$etat_rendezvous , $type_rendezvous);
    
    $sql="select * from rendezvous r , user u 
        where
        u.id_user=r.id_patient
        and
        r.id_patient=? 
        and
        r.etat_rendezvous like ? 
         and
        r.type_rendezvous like ? 
        ";
       if (!empty($date)) {
          $sql .= ' and date_rendezvous like ?';
         $params[]=$date;
       }  
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $reservation = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $reservation ;
}





function insert_rendez_vous(array $rendezvous):int{
    $pdo=ouvrir_connection_bd();
    extract($user);
    $sql="INSERT INTO `rendezvous` (`etat_rendezvous`, `date_rendezvous`, `heure_rendezvous`, `type_rendezvous`, `id_patient`) 
    VALUES (?, ?, ?, ?, ?);
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(['en cour',$date , $heure , $type_rendezvous , $id_patient]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}
































?>