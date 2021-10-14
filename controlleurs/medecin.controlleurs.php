<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.consultation') {
        liste_rendez_vous_by_medecin();
       }elseif ($_GET['view']=='consulter') { 
        details_patient();      
       }elseif ($_GET['view']=='liste.patient') { 
        liste_patients();       
    }
}
}else {
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.consultation') {
                liste_rendez_vous_by_medecin($_POST);
            }elseif ($_POST['action']=='annuler') {
              changer_etat_consultation($_POST);
              liste_rendez_vous_by_medecin();
            }elseif ($_POST['action']=='modifier') {
                ajout_consultation($_POST);
                consulter_tout($_POST);
                liste_rendez_vous_by_medecin();

              }
        }
    }
}











function liste_rendez_vous_by_medecin(array $data=null){
    $title_page='Liste des Consultations';
    $id_user=$_SESSION['userConnect']['id_user'];
    if (is_null($data)) {
            $count=count_all_rendez_vous_by_medecin($id_user); 
            $parPage = NOMBRE_PAR_PAGE;
            $currentPage=isset($_GET['page'])?$_GET['page']:1;
            $pages = ceil($count/ $parPage);
            $premier = ($currentPage * $parPage) - $parPage;
            $rows=find_all_rendez_vous_by_medecin($id_user,$premier);
            $medecin_rendezvous= $rows['data'];
    }else {
        extract($data);
        $count=count_all_rendez_vous_by_medecin_by_date_or_etat($id_user,$etat,$date,$premier); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $medecin_rendezvous=find_all_rendez_vous_by_medecin_by_date_or_etat($id_user,$etat,$date,$premier);
    }
    require(ROUTE_DIR.'views/medecin/liste.consultation.html.php');  
    }



    function changer_etat_consultation(array $data){
        extract($data);
        $Changer_etat=update_etat_consultation('annuler',$id_consultation);

    }

    

    function details_patient(){
     $class_consultation="active";
     $class_prestation="";
    if (isset($_GET['id_patient'])) {
        $id_user=$_GET['id_patient'];
        $_SESSION['id_patient']=$id_user;
    }
    if (isset($_GET['lien'])) {
        $class_consultation="";
        $class_prestation="";
        if($_GET['lien']=="prestation"){
           
            $class_prestation="active";
        }else{
            $class_consultation="active"; 
        }
    }
      
    $details=detail_patient($id_user);
    //consultation
    $count=count_consultation_patient($id_user); 
    $parPage = NOMBRE_PAR_PAGE;
    $currentPage=isset($_GET['page'])?$_GET['page']:1;
    $pages = ceil($count/ $parPage);
    $premier = ($currentPage * $parPage) - $parPage;
    $rows=consultation_patient($id_user,$premier);
    $consultations= $rows['data'];

    // prestation
    $count=count_prestation_patient($id_user); 
    $parPage = NOMBRE_PAR_PAGE;
    $currentPage=isset($_GET['page'])?$_GET['page']:1;
    $pages = ceil($count/ $parPage);
    $premier = ($currentPage * $parPage) - $parPage;
    $rows=prestation_patient($id_user,$premier);
    $prestations= $rows['data'];

    // medicament
    $medicaments=find_all_medicament();
    require(ROUTE_DIR.'views/medecin/consulter.html.php');   
    }

    
    function liste_patients(){
    $title_page='Liste des Patients'; 
            $count=count_all_patient('patient'); 
            $parPage = NOMBRE_PAR_PAGES;
            $currentPage=isset($_GET['page'])?$_GET['page']:1;
            $pages = ceil($count/ $parPage);
            $premier = ($currentPage * $parPage) - $parPage;
            $rows=find_all_patient('patient',$premier);
            $patients= $rows['data'];
    require(ROUTE_DIR.'views/medecin/liste.patient.html.php');  

    }
    

    function ajout_consultation(array $data){
        if (isset($_GET['id_consultation'])) {
        $id_consultation=$_GET['id_consultation'];
        $_SESSION['id_consultation']=$id_consultation;
        }
      
        extract($data);
        $modifier=update_consultation($constantes ,'deja fait', $descriptions , $id_consultation);  
             
        
    }





    function consulter_tout( array $data):void{
        $id_consultation=$_SESSION['id_consultation'];
        $data['id_consultation']=$id_consultation;
          extract($data);
          $id_ordonnance=insert_ordonnance($data);
            foreach ($medicaments as $medicament) {
                $id_medicament=(int)$medicament;
                       insert_ordonnance_medicament($id_ordonnance,$id_medicament,$posologies);
                }
            header('location:'.WEB_ROUTE.'?controlleurs=medecin&view=liste.consultation');
            exit();
        
    }
    