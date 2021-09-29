<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.prestation') {
        liste_prestation();       
    }elseif ($_GET['view']=='traiter_prestation') {
        require(ROUTE_DIR.'views/responsable.prestation/traiter_prestation.html.php');
    }

}


}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.les.prestations') {
                liste_prestation($_POST); 
            }
        }
    }
}














function liste_prestation(array $data=null){
    $title_page='Liste des Prestations';
    if (is_null($data)) {
        $count=count_all_prestation(); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rows=find_all_prestation($premier);
        $prests= $rows['data'];
    }else {
        extract($data);
        $count=count_all_prestations_by_date_or_etat($etat,$type,$date); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $prests=find_all_prestations_by_date_or_etat($etat,$date,$premier);
    }
    require(ROUTE_DIR.'views/responsable.prestation/liste.prestation.html.php');
}