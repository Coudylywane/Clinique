<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.rendez-vous') {
        require(ROUTE_DIR.'views/medecin/liste.rendez-vous.html.php');
       }

}
}