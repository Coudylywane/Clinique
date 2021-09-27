<?php

// Les rendezvous 


function find_all_rendez_vous(int $offset=0):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , type_medecin t 
    where 
    r.id_type_medecin=t.id_type_medecin
    limit $offset,".NOMBRE_PAR_PAGE;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $rendezvous= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return [
        "data" => $rendezvous,
        "count" => $sth->rowCount()
       ] ;
}

// count

function count_all_rendez_vous():int{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , type_medecin t 
    where 
    r.id_type_medecin=t.id_type_medecin
    ;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    fermer_connection_bd($pdo);
    return $sth->rowCount();

}




function find_all_rendez_vous_secretaire_by_date_by_etat_type($etat_rendezvous ,$type_rendezvous ,$date,int $offset):array{
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

        $sql .=" limit $offset,".NOMBRE_PAR_PAGE; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($params);
    $reservation = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $reservation ;
   
}

function count_all_rendez_vous_secretaire_by_date_by_etat_type($etat_rendezvous ,$type_rendezvous ,$date):int{
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
    fermer_connection_bd($pdo);
    return $sth->rowCount() ;
}














////// medecin








 function find_all_medecin_disponible():array{
    $pdo=ouvrir_connection_bd();
    $sql = "SELECT * from user u , role r , type_medecin t 
    where 
    u.id_role=r.id_role
    and
    u.id_type_medecin=t.id_type_medecin
    and
    t.nom_type_medecin like 'generaliste'
    and
    u.id_user not in (
              SELECT u.id_user from rendezvous re , user u , role r , type_medecin t 
               where
                  u.id_role=r.id_role
                    and 
                  u.id_type_medecin=t.id_type_medecin
                     and 
                 re.date_rendezvous like '2021-08-05'
                    AND
                 re.heure_rendezvous like '11:00'
               );
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $medecinss= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $medecinss ;
}
 








function find_all_detail_rendezvous(int $id_rendezvous):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , type_medecin t , user u
    where 
    r.id_type_medecin=t.id_type_medecin
    and
    r.id_patient=u.id_user
    and
    r.id_rendezvous=?
    ;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_rendezvous]);
    $rendezvous= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return  $rendezvous;
}





























?>











































