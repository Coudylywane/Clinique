<?php 

function find_all_rendez_vous_by_medecin(int $id_user ):array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from rendezvous r , type_medecin t , user u 
             where 
             r.id_type_medecin=t.id_type_medecin
             AND
            u.id_type_medecin=t.id_type_medecin
             AND
            u.id_user=?;";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    $rendezvous= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $rendezvous;
}





?>