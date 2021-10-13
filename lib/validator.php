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

// nom valid 


function validation_nom($nom):bool{
    if (preg_match(PATTERN_NAME,$nom)) {
       return true;
    }
    return false ;
}

function valide_nom(string $nom , string $key , array &$arrayError):void{
    if (est_vide($nom)) {
      $arrayError[$key]='le champ est obligatoire';
    }elseif (!validation_nom($nom)) {
        $arrayError[$key]="le nom ou le prenom n'est pas valide  ";
    }
}

// telephone valid 


function validation_telephone($telephone):bool{
    if (preg_match(PATTERN_TELEPHONE,$telephone)) {
       return true;
    }
    return false ;
}

function valide_telephone(string $telephone , string $key , array &$arrayError):void{
    if (est_vide($telephone)) {
      $arrayError[$key]='le champ est obligatoire';
    }elseif (!validation_password($telephone)) {
        $arrayError[$key]="le n'est pas valide ";
    }
}

// SEXE valid 

function validation_sexe($telephone):bool{
    if (preg_match(PATTERN_TELEPHONE,$telephone)) {
       return true;
    }
    return false ;
}

function valide_sexe(string $sexe , string $key , array &$arrayError):void{
    if (est_vide($sexe)) {
      $arrayError[$key]='le champ est obligatoire';
    }elseif (!validation_password($sexe)) {
        $arrayError[$key]="le n'est pas valide ";
    }
}

// adresse valid 



function valide_adresse(string $adresse , string $key , array &$arrayError):void{
    if (est_vide($adresse)) {
      $arrayError[$key]='le champ est obligatoire';
    }
}



// date valid

function valide_date(string $date , string $key , array &$arrayError):void{
    if (est_vide($date)) {
      $arrayError[$key]='le champ est obligatoire';
    }
}

// heure valid


function valide_heure(string $heure , string $key , array &$arrayError):void{
    if (est_vide($heure)) {
      $arrayError[$key]='le champ est obligatoire';
    }
}



?>