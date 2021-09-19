<?php

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



function insert_antecedant_medicaux(array $antecedantMedicaux):int{
   $pdo= ouvrir_connection_bd();
   extract($antecedantMedicaux);
   $sql="INSERT INTO `antecedant_medicaux` (`nom_antecedant_medicaux`)
    VALUES (?);
    ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute($medicaux);
   $dernier_id = $pdo->lastInsertId();
   fermer_connection_bd($pdo);//fermeture
   return $dernier_id ;
}

/* function insert_user_medicaux( $userMedicaux):int{
    $pdo= ouvrir_connection_bd();
    $sql="INSERT INTO `user_antecedant_medicaux` (`id_user, id_antecedant_medicaux`)
     VALUES (?,?);
     ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(
        $_SESSION['userConnect']['id_user'],
        $id_antecedant_medicaux=insert_antecedant_medicaux($medicaux));
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_bd($pdo);//fermeture
    return $dernier_id ;
 } */


 /* function add_bien(array $post):void{
    //`etat_bien`, `type_bien`, `reference`, `prix`, `description_bien`, `id_zone`, `date_creation`, `addresse`, `id_user`
         extract($post);
        $bien=[
          "Disponible",
           $type,
           uniqid(),
           $prix,
           $description,
           $zone,
           date_format(date_create(),'Y-m-d H:i:s'),
           $adresse,
           $_SESSION['userConnect']['id_user']
        ];
        $id_bien=insert_bien( $bien);
        foreach ($avatar as $file) {
            $image=[
               $file,
               $id_bien
            ];
            insert_image($image);
        }
        
        show_form_bien();
    } */