<?php


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='liste.prestation') {
        liste_prestation();       
    }elseif ($_GET['view']=='traiter_prestation') {
        detail_prestation();
        }

}


}elseif ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['action'])){
            if ($_POST['action']=='filtre.les.prestations') {
                liste_prestation($_POST); 
            }elseif ($_POST['action']=='traiter_prestations') {
                //die("rerre");
              Changer_etat($_POST, $_FILES);
            }
        }
}















function liste_prestation(array $data=null){
    $title_page='Liste des Prestations';
    if (is_null($data)) {
        $count=count_all_prestation(); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $rows=find_all_prestation($premier);
        $prests= $rows['data'];
    }else {
        extract($data);
        $count=count_all_prestations_by_date_or_etat($etat,$type,$date); 
        $parPage = NOMBRE_PAR_PAGE;
        $currentPage=isset($_GET['page'])?$_GET['page']:1;
        $pages = ceil($count/ $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $prests=find_all_prestations_by_date_or_etat($etat,$date,$premier);
    }
    require(ROUTE_DIR.'views/responsable.prestation/liste.prestation.html.php');
}



function detail_prestation(){
    if (isset($_GET['id_prestation'])) {
        $id_prestation=$_GET['id_prestation'];
    }
    $details= find_all_detail_prestation($id_prestation);
    /* var_dump($details);
    die; */
    require(ROUTE_DIR.'views/responsable.prestation/traiter_prestation.html.php');

}



function changer_etat(array $data , $files){
    extract($data);
    if ($traiter=='valide') {
        $target_dir = "upload/";
        $arrayBasename=[];
        $arrayTmpname=[];
        $arraySize=[];
        $arrayError=[];


        foreach ($_FILES as $key => $values) {
           foreach ($values['name'] as $key => $value) {
             $arrayBasename[]=$target_dir.basename($value);
              
           }
           foreach ($values['tmp_name'] as $key => $value) {
            $arrayTmpname[]=$value;
          }

          foreach ($values['size'] as $key => $value) {
            $arraySize[]=$value;
          }

        }
        $id_image=[];
         foreach ($arrayBasename as  $image) {
            $nom_image=$image;
            insert_image($nom_image, $id_prestation);
        }
     $Changer_etat=update_etat_prestation('deja fait',$id_prestation);
    for ($i=0; $i < count($arrayBasename); $i++) { 
        valide_image1($arraySize[$i], $arrayError, 'images', $arrayBasename[$i]);

    }
   
             if(count($arrayError) == 0) {
                 for ($i=0; $i < count($arrayBasename); $i++) { 
                    if(!upload_image1($arrayTmpname[$i], $arrayBasename[$i])) {
                        $arrayError['images'] = "Erreur lors de l'upload de l'image";
                        $_SESSION['images']=$arrayError;
                        header('location:'.WEB_ROUTE.'?controlleurs=responsable.prestation&view=traiter_prestation');
                        exit();
                  }
                 }
                  
              }
       
      }else {
        $Changer_etat=update_etat_prestation('annuler',$id_prestation);
    }

    header('location:'.WEB_ROUTE.'?controlleurs=responsable.prestation&view=liste.prestation');
    exit();
}
  

  
 

?>
