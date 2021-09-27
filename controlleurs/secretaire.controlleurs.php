<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='rendez-vous') {
        liste_rendez_vous();       
    }elseif ($_GET['view']=='traiter_rendezvous') {
        liste_medecin_disponible() ;   
    }

}







}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.les.rendezvous') {
               liste_rendez_vous($_POST); 
            }elseif ($_POST['action']=='traiter_rendezvous') {
                liste_medecin_disponible($_POST) ;   
            }
        }
    }
}









function liste_rendez_vous(array $data=null){
$title_page='Liste des Rendez-vous';
$count=count_all_rendez_vous(); 
$parPage = NOMBRE_PAR_PAGE;
$currentPage=isset($_GET['page'])?$_GET['page']:1;
$pages = ceil($count/ $parPage);
$premier = ($currentPage * $parPage) - $parPage;
$rows=find_all_rendez_vous($premier);
$rendezvous= $rows['data'];
    if (!is_null($data)) {
        extract($data);
        $count=count_all_rendez_vous_secretaire_by_date_by_etat_type($etat,$type,$date,$premier); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rendezvous=find_all_rendez_vous_secretaire_by_date_by_etat_type($etat,$type,$date,$premier);
    }
require(ROUTE_DIR.'views/secretaire/rendez-vous.html.php');  
}


function liste_medecin_disponible(){
    $title_page='Liste des medecin disponible';
    $id_rendezvous=$_GET['id_rendezvous'];
    $rendezvousdetail=find_all_detail_rendezvous($id_rendezvous);
    $medecins=find_all_medecin_disponible();
    require(ROUTE_DIR.'views/secretaire/traiter.rendezvous.html.php');  
}
