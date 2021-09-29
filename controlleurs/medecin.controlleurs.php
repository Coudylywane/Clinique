<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.rendez-vous') {
        liste_rendez_vous_by_medecin();
       }

}
}



function liste_rendez_vous_by_medecin(){
    $id_user=$_SESSION['userConnect']['id_user'];
    $title_page='Liste des Rendez-vous';
    $medecin_rendezvous=find_all_rendez_vous_by_medecin((int)$id_user);
    require(ROUTE_DIR.'views/medecin/liste.rendez-vous.html.php');  
}

