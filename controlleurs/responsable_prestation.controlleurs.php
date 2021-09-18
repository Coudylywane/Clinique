<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.prestation') {
        require(ROUTE_DIR.'views/responsable.prestation/liste.prestation.html.php');
       }

}
}