<?php 

function est_medecin():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='medecin';
}

function est_patient():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='patient';
}

function est_secretaire():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='secretaire';
}


function est_responsable_prestation():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='responsable_prestation';
}





?>