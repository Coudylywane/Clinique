<?php 
function est_vide(string $valeur): bool {
    return empty($valeur);
}

function form_valid($arrayError):bool{
    if (count($arrayError)==0) {
        return true;
    }
    return false;
}

// login valid 

function validation_login($login):bool{
    if (preg_match(PATTERN_EMAIL,$login)) {
       return true;
    }
    return false ;
}


function valide_login(string $login , string $key , array &$arrayError):void{
    if (est_vide($login)) {
      $arrayError[$key]='le champ est obligatoire';
    }elseif (!validation_login($login)) {
        $arrayError[$key]="l'email n'est pas valide ";
    }
}

// password valid

function validation_password($password):bool{
    if (preg_match(PATTERN_PASSWORD,$password)) {
       return true;
    }
    return false ;
}

function valide_password(string $password , string $key , array &$arrayError):void{
    if (est_vide($password)) {
      $arrayError[$key]='le champ est obligatoire';
    }elseif (!validation_password($password)) {
        $arrayError[$key]="le mot de passe n'est pas valide ";
    }
}













?>