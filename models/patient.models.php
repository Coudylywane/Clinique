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



function find_all_rendez_vous_by_date_by_etat_type($etat_rendezvous='en cour' , $date=null , $type_rendezvous='consultation'):array{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_rendezvous , $type_rendezvous );
    $sql="select * from rendezvous r , user u 
        where
        u.id_user=r.id_patient
        and 
        r.id_patient=? 
        and
        r.etat_rendezvous like=? 
        and
        r.type_rendezvous like=? 
        ";
       if (!empty($date)) {
          $sql .= 'and
          r.date_reservation like ?';
          $params[]=$date;
       }
       
        
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $reservation = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $reservation ;
}



?>