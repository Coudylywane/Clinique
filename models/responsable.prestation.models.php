<?php 








function find_all_prestation():array{
    $pdo=ouvrir_connection_bd();
    $sql = "select * from prestation
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $prestations= $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $prestations ;
}






























?>