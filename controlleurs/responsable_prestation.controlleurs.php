<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.prestation') {
        liste_prestation();       
    }

}
}



function liste_prestation(){
    $title_page='Liste des Prestations';
    $prests=find_all_prestation();
    require(ROUTE_DIR.'views/responsable.prestation/liste.prestation.html.php');

}