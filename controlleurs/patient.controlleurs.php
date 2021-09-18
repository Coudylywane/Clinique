<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='mes.rendez-vous') {
        require(ROUTE_DIR.'views/patient/mes.rendez-vous.html.php');
       }

}
}















?>