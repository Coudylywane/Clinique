<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='rendez-vous') {
        liste_rendez_vous();       
    }elseif ($_GET['view']=='traiter_rendezvous') {
        liste_medecin_disponible() ;   
    }

}else {
    require(ROUTE_DIR.'views/security/connexion.html.php');
}



}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.les.rendezvous') {
               liste_rendez_vous($_POST); 
            }elseif ($_POST['action']=='traiter_rendezvous') {
                liste_medecin_disponible($_POST) ;   
            }elseif ($_POST['action']=='valider_rendezvous') {
                liste_rendez_vous(); 
            }
        }
    }
}









function liste_rendez_vous(array $data=null){
    changer_etat($_POST);

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
    if ($rendezvousdetail[0]["type_rendezvous"]=='consultation') {
    $date_rendezvous=$rendezvousdetail[0]["date_rendezvous"];
    $heure_rendezvous=substr($rendezvousdetail[0]["heure_rendezvous"], 0, 5);
       $medecins=find_all_medecin_disponible(
        $rendezvousdetail[0]["nom_type_medecin"],
        $date_rendezvous,
        $heure_rendezvous
        );
    }else {
        $rendezvousdetail= find_all_detail_rendezvous2($id_rendezvous);
       

    }
     require(ROUTE_DIR.'views/secretaire/traiter.rendezvous.html.php');  
}




function changer_etat( array $data){
    $id_rendezvous=(int)$_GET['id_rendezvous'];
    extract($data);
  if ($traiter=='valider') {
    $changer=update_etat_rendezvous( "valider",(int) $id_rendezvous);
    if ($type_rendezvous=='Consultation') {
    insert_consultation($date_rendezvous, $id_medecin, $id_rendezvous);
    }else {
       insert_prestation($nom_prestation,$date_rendezvous, $id_rendezvous);
    }
  }else {
    $changer=update_etat_rendezvous( "annuler", $id_rendezvous);
  }
  
}
