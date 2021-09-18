<?php
if (isset($_REQUEST['controlleurs'])) {
    if ($_REQUEST['controlleurs']=='security') {
        require_once(ROUTE_DIR.'controlleurs/security.controlleurs.php');
    }elseif ($_REQUEST['controlleurs']=='medecin') {
        require_once(ROUTE_DIR.'controlleurs/medecin.controlleurs.php');
    }elseif ($_REQUEST['controlleurs']=='patient') {
        require_once(ROUTE_DIR.'controlleurs/patient.controlleurs.php');
    }elseif ($_REQUEST['controlleurs']=='responsable.prestation') {
        require_once(ROUTE_DIR.'controlleurs/responsable_prestation.controlleurs.php');
    }elseif ($_REQUEST['controlleurs']=='secretaire') {
        require_once(ROUTE_DIR.'controlleurs/secretaire.controlleurs.php');
    }
   
}else {
    require_once(ROUTE_DIR.'controlleurs/security.controlleurs.php');
}







?>