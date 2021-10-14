<?php 


function find_all_rendez_vous_by_medecin(int $id_user, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , type_medecin t , user u , rendezvous r
             where 
             u.id_type_medecin=t.id_type_medecin
             AND
             c.id_medecin=u.id_user
             and 
             c.id_rendezvous=r.id_rendezvous
              and
    u.id_user=? limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    $consultation= $sth->fetchAll();
    fermer_connection_bd($pdo);
        return [
            'data'=> $consultation,
            'count'=> $sth->rowCount()
    ];
}

function count_all_rendez_vous_by_medecin(int $id_user ):int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , type_medecin t , user u , rendezvous r
    where 
    u.id_type_medecin=t.id_type_medecin
    AND
    c.id_medecin=u.id_user
    and 
    c.id_rendezvous=r.id_rendezvous
     and
    u.id_user=?;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}


function find_all_rendez_vous_by_medecin_by_date_or_etat(int $id_user,$etat_consultation, $date, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $params=array($id_user,$etat_consultation);
    $sql="select * from consultation c , type_medecin t , user u , 
    rendezvous r , user_antecedant_medicaux ua , antecedant_medicaux a 
    where 
    u.id_type_medecin=t.id_type_medecin
    AND
    c.id_medecin=u.id_user
    and 
    c.id_rendezvous=r.id_rendezvous
     and
    u.id_user=?
          and
        c.etat_consultation like ? ";
       if (!empty($date)) {
          $sql .= 'and
             c.date_consultation like ?
          ';
          $params[]=$date;
       }
       $sql .=" limit $offset,".NOMBRE_PAR_PAGE; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $prestations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations;
}


function count_all_rendez_vous_by_medecin_by_date_or_etat(int $id_user,$etat_consultation, $date):int{
    $pdo=ouvrir_connection_bd();
    $params=array($id_user,$etat_consultation);
    $sql="select * from consultation c , type_medecin t , user u , rendezvous r
    where u.id_type_medecin=t.id_type_medecin
    and c.id_medecin=u.id_user
    and c.id_rendezvous=r.id_rendezvous
    and u.id_user=?
    and c.etat_consultation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          c.date_consultation like ?';
          $params[]=$date;
       }
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    fermer_connection_bd($pdo);
    return $sth->rowCount();;
}




function update_etat_consultation($etat_consultation,$id_consultation):int{
    $pdo=ouvrir_connection_bd();
    $sql="UPDATE `consultation` 
    SET `etat_consultation` = ? 
    WHERE `consultation`.`id_consultation` = ?;
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$etat_consultation,$id_consultation]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}







function detail_patient(int $id_user):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from user u  
    where 
    u.id_user=?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    $rendezvous = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return  $rendezvous;
}



function consultation_patient(int $id_user , $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , user u ,rendezvous r 
    where 
    c.id_rendezvous=r.id_rendezvous
    and
    r.id_patient=u.id_user
    and
    u.id_user=?
    limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    $rendezvous = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $rendezvous,
        "count" => $sth->rowCount()
       ] ;
}

function count_consultation_patient(int $id_user):int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , user u ,rendezvous r 
    where 
    c.id_rendezvous=r.id_rendezvous
    and
    r.id_patient=u.id_user
    and u.id_user = ? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();

}


/// prestation
function prestation_patient(int $id_user, int $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation p , rendezvous r
    where 
    r.id_rendezvous=p.id_rendezvous
    and
    r.id_patient=?
    limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    $rendez = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $rendez,
        "count" => $sth->rowCount()
       ] ;
}


function count_prestation_patient(int $id_user):int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation p , rendezvous r
    where 
    r.id_rendezvous=p.id_rendezvous
    and
    r.id_patient=?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}



function find_all_medicament():array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from medicament 
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $rendezvous = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return  $rendezvous;

}

function find_all_patient($nom_role , $offset):array{
    $pdo=ouvrir_connection_bd();
    $sql = "SELECT * from user u , role r
            WHERE
            u.id_role=r.id_role
            and 
            r.nom_role like ?
            limit $offset,".NOMBRE_PAR_PAGES;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$nom_role]);
    $patients= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $patients,
        "count" => $sth->rowCount()
       ] ;
}


function count_all_patient($nom_role):int{
    $pdo=ouvrir_connection_bd();
    $sql = "SELECT * from user u , role r
            WHERE
            u.id_role=r.id_role
            and 
            r.nom_role like ?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$nom_role]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();

} 




function update_consultation($constantes ,$etat_consultation , $descriptions , $id_consultation):int{   
$pdo=ouvrir_connection_bd();
$sql = "UPDATE `consultation` SET 
`constantes_consultation` = ?, 
`etat_consultation` = ?, 
`description_consultation` = ?
 WHERE `consultation`.`id_consultation` = ?
 ;";
    
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$constantes ,$etat_consultation, $descriptions , $id_consultation]);
    return $sth->rowCount();
}





function insert_ordonnance(array $ordonnance):int{
    $pdo=ouvrir_connection_bd();
    extract($ordonnance);
    $sql="INSERT INTO `ordonnance` (`date_ordonnance`, `id_consultation`)
    VALUES (?, ?);
    ";
    $now = date_create();
    $now = date_format($now , 'Y-m-d H:i:s');  
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$now , $id_consultation]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}


function insert_ordonnance_medicament($id_ordonnance , $id_medicament , $posologie_medicament):int{
    $pdo=ouvrir_connection_bd();
    extract($rendez);
    $sql="INSERT INTO `ordonnance_medicament` (`id_ordonnance`, `id_medicament` ,`posologie_medicament` )
    VALUES (?, ? , ?);
    ";
    $now = date_create();
    $now = date_format($now , 'Y-m-d H:i:s');  
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_ordonnance , $id_medicament , $posologie_medicament]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}



















?>