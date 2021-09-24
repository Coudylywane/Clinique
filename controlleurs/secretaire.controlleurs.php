<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='rendez-vous') {
        liste_rendez_vous();       
    }

}
}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.les.rendezvous') {
               liste_rendez_vous($_POST); 
            }
        }
    }
}









function liste_rendez_vous(array $data=null){
$title_page='Liste des Rendez-vous';
$rendezvous= find_all_rendez_vous();
    if (!is_null($data)) {
        extract($data);
        $rendezvous=find_all_rendez_vous_secretaire_by_date_by_etat_type($etat,$type,$date);
    }
require(ROUTE_DIR.'views/secretaire/rendez-vous.html.php');  
}


