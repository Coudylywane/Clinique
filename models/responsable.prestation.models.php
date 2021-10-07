<?php 








function find_all_prestation(int $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation p, rendezvous r
    where
    p.id_rendezvous=r.id_rendezvous
    limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $prestations= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $prestations,
        "count" => $sth->rowCount()
       ] ;
    }

function count_all_prestation():int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation p, rendezvous r
    where
    p.id_rendezvous=r.id_rendezvous
    ;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}




function find_all_prestations_by_date_or_etat($etat_prestation, $date, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_prestation);
    $sql="select * from prestation p, rendezvous r
            where
            p.id_rendezvous=r.id_rendezvous
            and
        p.etat_prestation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          p.date_prestation like ?';
          $params[]=$date;
       }
       $sql .=" limit $offset,".NOMBRE_PAR_PAGE; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $prestations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}

function count_all_prestations_by_date_or_etat($etat_prestation, $date):int{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_prestation);
    $sql="select * from prestation p, rendezvous r
        where
        p.id_rendezvous=r.id_rendezvous
        and
        p.etat_prestation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          p.date_prestation like ?';
          $params[]=$date;
       }
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}




function find_all_detail_rendezvous_prestation(int $id_rendezvous):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , user u , prestation p
    where 
    r.id_patient=u.id_user
    and
    p.id_rendezvous=r.id_rendezvous
    and
    r.id_rendezvous=?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_rendezvous]);
    $rendezvous = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return  $rendezvous;
}

///
    function find_all_detail_prestation(int $id_prestation):array{
        $pdo=ouvrir_connection_bd();
        $sql = "select * from  prestation p  , rendezvous r , user u
        where 
        p.id_rendezvous=r.id_rendezvous
        AND
        r.id_patient=u.id_user
        and
        p.id_prestation=?
        ;";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_prestation]);
        $prestations= $sth->fetchAll();
        fermer_connection_bd($pdo);
        return  $prestations;
    }





    function update_etat_prestation(string $etat_prestation,  int $id_prestation):int{
        $pdo=ouvrir_connection_bd();
        $sql="UPDATE `prestation` 
        SET 
        `etat_prestation`= ? 
        WHERE 
        `prestation`.`id_prestation` = ?
        ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$etat_prestation,$id_prestation]);
        fermer_connection_bd($pdo);
        return $sth->rowCount();
    }








 function insert_image( string $nom_image):int{
    $pdo=ouvrir_connection_bd();
    extract($rendez);
    $sql="INSERT INTO `image` (`nom_image`) 
    VALUES (?);
    ";
        
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$nom_image]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}

function update_image_prestation($id_image , $id_prestation):int{
    $pdo=ouvrir_connection_bd();
    $sql="UPDATE `prestation` 
    SET `id_image` = ?
     WHERE `prestation`.`id_prestation` = ?;
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_image,$id_prestation]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}



















?>