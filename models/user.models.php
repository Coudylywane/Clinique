<?php
 
function find_user_by_login_password( $login ,  $password):array{
    $pdo=ouvrir_connection_bd();
    $sql="select * from user u , role r
    where
    u.id_role=r.id_role
    and
    u.login_user=? and u.password_user=?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($login,$password));
    $user = $sth->fetch();
    fermer_connection_bd($pdo);

    return $user== false?[]: $user ;
}

function insert_user(array $user):int{
    $pdo=ouvrir_connection_bd();
    extract($user);
    $sql="INSERT INTO `user` ( `nom_user`, `prenom_user`, `login`, `password`,  `id_role`)
     VALUES (?, ?, ?, ?, ?);";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $now = date_create();
    $now = date_format($now , 'Y-m-d H:i:s');
    $sth->execute([ $nom , $prenom , $login, $password , $id_role ]);
    fermer_connection_bd($pdo);
    return $sth->rowCount();
}
