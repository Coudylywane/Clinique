<?php

function find_all_antecedant():array{
	$pdo= ouvrir_connection_bd();
	$sql="select * from antecedant_medicaux";
	$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute();
	$datas = $sth->fetchAll();
	fermer_connection_bd($pdo);
	return $datas;
}


function find_login(string $login):array{
    $pdo=ouvrir_connection_bd();
    $sql="select * from user u where u.login_user=? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($login));
    $user = $sth->fetchAll();
    fermer_connection_bd($pdo);
    return $user ;
}

 
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
    $sql="INSERT INTO `user` (`nom & prenom`, `code_patient`, `login_user`, `password_user`, `confirm_password`, `sexe_user`,
     `telephone_user`, `adresse_user`, `avatar`, `id_role`) 
    VALUES (?,?,?,?,?,?,?,?,?,?);
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$nom,rand(),$login,$password,$password2,$sexe,$telephone,$adresse,$avatar,'2']);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);
    return $dernier_id;
}




  function insert_user_antecedant(int $id_patient , int $id_antecedant_medicaux ){
    $pdo= ouvrir_connection_bd();
	$sql="INSERT INTO `user_antecedant_medicaux`(`id_patient`, `id_antecedant_medicaux`) VALUES (?,?);";
	$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_patient ,$id_antecedant_medicaux]);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);//fermeture
    return $dernier_id ;
 } 


 

 