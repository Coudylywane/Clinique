<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='mes.rendez-vous') {
        lister_rendez_vous_un_client();
          }elseif ($_GET['view']=='mes.consultations') { 
            lister_consultation_un_client();  
        }elseif ($_GET['view']=='mes.prestations') { 
            lister_prestation_un_client();
        }elseif ($_GET['view']=='prendre_rendez_vous') { 
            require(ROUTE_DIR.'views/patient/prendre_rendez_vous.html.php');   
  
        }


        }
}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.rendezvous') {
               lister_rendez_vous_un_client($_POST); ;
            }
        }
    }
}





function lister_rendez_vous_un_client(array $data=null){
    $id_user=$_SESSION['userConnect']['id_user'];
    if (is_null($data)) {
        $rendezs=find_all_rendez_vous_by_patient($id_user);
    }else {
       
        extract($data);
        $rendezs=find_all_rendez_vous_by_date_by_etat_type( $id_user,$etat ,$type,$date);
    }
    require(ROUTE_DIR.'views/patient/mes.rendez-vous.html.php');   
    }


    function lister_consultation_un_client(){
        $id_user=$_SESSION['userConnect']['id_user'];
        $consultations=find_all_consultation_by_patient($id_user);
        require(ROUTE_DIR.'views/patient/mes.consultations.html.php');        
     }



     function lister_prestation_un_client(){
        $id_user=$_SESSION['userConnect']['id_user'];
        $prestations=find_all_prestation_by_patient($id_user);
        require(ROUTE_DIR.'views/patient/mes.prestation.html.php');   
         }
      
    


function prendre_rendez_vous(){
    $id_user=$_SESSION['userConnect']['id_user'];
    $prendres= insert_rendez_vous($id_user);
    require(ROUTE_DIR.'views/patient/prendre_rendez_vous.html.php');   
}










?>