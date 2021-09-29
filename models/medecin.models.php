<?php 



function find_all_rendez_vous_by_medecin(int $id_user, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from consultation c , type_medecin t , user u 
            where 
            u.id_type_medecin=t.id_type_medecin
            AND
            c.id_medecin=u.id_user
            AND
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
    $sql = "select * from consultation c , type_medecin t , user u 
            where 
            u.id_type_medecin=t.id_type_medecin
            AND
            c.id_medecin=u.id_user
            AND
            u.id_user=?;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}


function find_all_rendez_vous_by_medecin_by_date_or_etat(int $id_user,$etat_consultation, $date, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $params=array($id_user,$etat_consultation);
    $sql="select * from consultation c , type_medecin t , user u 
          where 
          u.id_type_medecin=t.id_type_medecin
          and
          c.id_medecin=u.id_user
          and
          u.id_user=?
          and
        c.etat_consultation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          c.date_consultation like ?';
          $params[]=$date;
       }
       $sql .=" limit $offset,".NOMBRE_PAR_PAGE; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $prestations = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}


function count_all_rendez_vous_by_medecin_by_date_or_etat(int $id_user,$etat_consultation, $date):int{
    $pdo=ouvrir_connection_bd();
    $params=array($id_user,$etat_consultation);
    $sql="select * from consultation c , type_medecin t , user u 
          where 
          u.id_type_medecin=t.id_type_medecin
          and
          c.id_medecin=u.id_user
          and
          u.id_user=?
          and
        c.etat_consultation like ? ";
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




























?>