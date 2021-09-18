<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='rendez-vous') {
        require(ROUTE_DIR.'views/secretaire/rendez-vous.html.php');
       }

}
}
