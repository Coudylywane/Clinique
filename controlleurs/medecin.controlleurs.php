<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.consultation') {
        liste_rendez_vous_by_medecin();
       }

}
}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.consultation') {
                liste_rendez_vous_by_medecin($_POST);
            }
        }
    }
}











function liste_rendez_vous_by_medecin(array $data=null){
    $title_page='Liste des Consultations';
    $id_user=$_SESSION['userConnect']['id_user'];
    if (is_null($data)) {
            $count=count_all_rendez_vous_by_medecin($id_user); 
            $parPage = NOMBRE_PAR_PAGE;
            $currentPage=isset($_GET['page'])?$_GET['page']:1;
            $pages = ceil($count/ $parPage);
            $premier = ($currentPage * $parPage) - $parPage;
            $rows=find_all_rendez_vous_by_medecin($id_user,$premier);
            $medecin_rendezvous= $rows['data'];
    }else {
        extract($data);
        $count=count_all_rendez_vous_by_medecin_by_date_or_etat($id_user,$etat,$date,$premier); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $medecin_rendezvous=find_all_rendez_vous_by_medecin_by_date_or_etat( $id_user,$etat,$date,$premier);
    }
    require(ROUTE_DIR.'views/medecin/liste.consultation.html.php');  
    }