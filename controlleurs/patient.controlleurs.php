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
            $title_page='Nouveau Rendez-vous';
            $type_rendezvous=find_all_type_medecin();
            require(ROUTE_DIR.'views/patient/prendre_rendez_vous.html.php');   
  
        }


        }
}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.rendezvous') {
               lister_rendez_vous_un_client($_POST);
            }elseif ($_POST['action']=='prendre_rendez_vous') {
                prendre_rendez_vous($_POST);
            }elseif ($_POST['action']=='filtre.consultation') {
                lister_consultation_un_client($_POST);
            }elseif ($_POST['action']=='filtre.prestation') {
                lister_prestation_un_client($_POST);
            }
        }
    }
}





function lister_rendez_vous_un_client(array $data=null){
    $title_page='Liste des Rendez-vous';
    $id_user=$_SESSION['userConnect']['id_user'];
    if (is_null($data)) {
        $count=count_rendez_vous_by_patient($id_user); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rows=find_all_rendez_vous_by_patient($id_user,$premier);
        $rendezs= $rows['data'];
       

    }else {
       
        extract($data);
        $count=count_rendez_vous_by_date_by_etat_type($id_user,$etat,$type,$date); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rendezs=find_all_rendez_vous_by_date_by_etat_type( $id_user,$etat,$type,$date,$premier);
    }
    require(ROUTE_DIR.'views/patient/mes.rendez-vous.html.php');   
    }

///// consultation

    function lister_consultation_un_client(array $data=null){
        $title_page='Liste des Consultations';
        $id_user=$_SESSION['userConnect']['id_user'];
        if (is_null($data)) {
                $count=count_all_consultation_by_patient($id_user); 
                $parPage = NOMBRE_PAR_PAGE;
                $currentPage=isset($_GET['page'])?$_GET['page']:1;
                $pages = ceil($count/ $parPage);
                $premier = ($currentPage * $parPage) - $parPage;
                $rows=find_all_consultation_by_patient($id_user,$premier);
                $consultations= $rows['data'];
        }else {
            extract($data);
            $count=count_all_consultation_by_date_or_etat($id_user,$etat,$date,$premier); 
            $parPage = NOMBRE_PAR_PAGE;
            $currentPage=isset($_GET['page'])?$_GET['page']:1;
            $pages = ceil($count/ $parPage);
            $premier = ($currentPage * $parPage) - $parPage;
            $consultations=find_all_consultation_by_date_or_etat($id_user,$etat,$date,$premier);
        }
        require(ROUTE_DIR.'views/patient/mes.consultations.html.php');   
        }
       
///// prestations
function lister_prestation_un_client(array $data=null){
    $title_page='Liste des Prestations';
    $id_user=$_SESSION['userConnect']['id_user'];
    if (is_null($data)) {
        $count=count_all_prestation_by_patient($id_user); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rows=find_all_prestation_by_patient($id_user,$premier);
        $prestations= $rows['data'];
    }else {
        extract($data);
        $count=count_all_prestation_by_date_or_etat($id_user,$etat,$type,$date); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $prestations=find_all_prestation_by_date_or_etat( $id_user,$etat,$date,$premier);
    }
    require(ROUTE_DIR.'views/patient/mes.prestation.html.php');  
}      
   

 



//// rendez_vous
function prendre_rendez_vous( array $data):void{
    $arrayError=array();
    extract($data);
   
     valide_date($date,'date',$arrayError);
     valide_heure($heure,'heure',$arrayError);
     if (form_valid($arrayError)) {
        $id_patient=$_SESSION['userConnect']['id_user'];
        $data['id_patient']= $id_patient;
        if (est_medecin($data['id_patient'])) {
            $data['medecin']=$id_patient;
        }else {
            $data['medecin']=null;
        }
        $data['type_medecin']= empty($data['type_medecin'])? null : $data['type_medecin'];
        $data['nom_prestation']=empty($data['nom_prestation'])? null : $data['nom_prestation'];
        $prendres=insert_rendez_vous($data);
        header('location:'.WEB_ROUTE.'?controlleurs=patient&view=mes.rendez-vous');
        exit();
    }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controlleurs=patient&view=prendre_rendez_vous');
         exit();
}
}








?>