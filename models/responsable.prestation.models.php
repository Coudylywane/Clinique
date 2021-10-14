<?php 




function find_all_prestation($type_rendezvous,int $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r
    where
    r.type_rendezvous like ?
    limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(['prestation']);
    $prestations= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $prestations,
        "count" => $sth->rowCount()
       ] ;
    }

function count_all_prestation($type_rendezvous):int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r
    where
    r.type_rendezvous like ?
    ;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$type_rendezvous]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}




function find_all_prestations_by_date_or_etat($etat_rendezvous,$type_rendezvous, $date, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_rendezvous,$type_rendezvous);
    $sql="select * from rendezvous r
         where
        r.type_rendezvous like ?
        and
        r.etat_rendezvous like ? ";
       if (!empty($date)) {
          $sql .= 'and
          r.date_rendezvous like ?';
          $params[]=$date;
       }
       $sql .=" limit $offset,".NOMBRE_PAR_PAGE; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $prestations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}

function count_all_prestations_by_date_or_etat($etat_prestation,$type_rendezvous, $date):int{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_prestation, $type_rendezvous);
    $sql="select * from rendezvous r
    where
     r.type_rendezvous like ?
     and
     r.etat_rendezvous like ?";
       if (!empty($date)) {
          $sql .= 'and
          r.date_rendez-vous like ?';
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
    function find_all_detail_prestation(int $id_rendezvous):array{
        $pdo=ouvrir_connection_bd();
        $sql = "select * from  prestation p  , rendezvous r , user u
        where 
        p.id_rendezvous=r.id_rendezvous
        AND
        r.id_patient=u.id_user
        and
        p.id_rendezvous=?
        ;";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_rendezvous]);
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








 function insert_image( string $nom_image , $id_prestation):int{
    $pdo=ouvrir_connection_bd();
    extract($rendez);
    $sql="INSERT INTO `image` (`nom_image` , `id_prestation` ) 
    VALUES (?,?);
    ";
        
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$nom_image , $id_prestation]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}





















?>