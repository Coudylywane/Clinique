<?php 








function find_all_prestation(int $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation
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
    $sql = "select * from prestation
    ;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}




function find_all_prestations_by_date_or_etat($etat_prestation, $date, int $offset):array{
    $pdo=ouvrir_connection_bd();
    $params=array($etat_prestation);
    $sql="select * from prestation p
        where 
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
    $sql="select * from prestation p 
        where 
        p.etat_prestation like ? ";
       if (!empty($date)) {
          $sql .= 'and
          p.date_prestation like ?';
          $params[]=$date;
       }
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    fermer_connection_bd($pdo);
    return $sth->rowCount() ;
}


























?>