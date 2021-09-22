<?php

// prestation et filtre

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

function find_all_prestation_by_date_or_etat($patient,$etat_consultation, $date):array{
    $pdo=ouvrir_connection_bd();
    $params=array($patient,$etat_consultation);
    $sql="select * from prestation p , rendezvous r
        where 
        r.id_rendezvous=p.id_rendezvous 
        and 
        r.id_patient= ?
        and
        p.etat_prestation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          p.date_prestation like ?';
          $params[]=$date;
       }
        
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $prestations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}






//// consultation et filtre


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

function find_all_consultation_by_date_or_etat($patient,$etat_consultation, $date):array{
    $pdo=ouvrir_connection_bd();
    $params=array($patient,$etat_consultation);
    $sql="select * from consultation c , rendezvous r
        where 
        r.id_rendezvous=c.id_rendezvous 
        and 
        r.id_patient= ?
        and
        c.etat_consultation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          c.date_consultation like ?';
          $params[]=$date;
       }
        
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $consultations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $consultations ;
}









/// rendez_vous et filtre


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



function insert_rendez_vous( $rendez):int{
    $pdo=ouvrir_connection_bd();
    extract($rendez);
    $sql="INSERT INTO `rendezvous` (`etat_rendezvous`, `date_rendezvous`, `heure_rendezvous`
    ,`type_rendezvous`,`id_medecin`,`id_patient`) 
    VALUES (?, ?, ?, ?, ?,?);
    ";
        $date = date_create();
        $date = date_format($date , 'Y-m-d H:i:s');
        $heure = date_create();
        $heure = date_format($heure , ' H:i:s');
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(['en cour',$date , $heure , $type_rendezvous ,$medecin, $id_patient]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}

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



// tous les medecin 
function find_all_type_medecin():array{
	$pdo= ouvrir_connection_bd();
	$sql="select * from type_medecin t , user u
    where 
    u.id_type_medecin=t.id_type_medecin
    ";
	$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute();
	$datas = $sth->fetchAll();
	fermer_connection_bd($pdo);
	return $datas;
}























?>