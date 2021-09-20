<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['view'])) {
       if ($_GET['view']=='connexion') {
        require(ROUTE_DIR.'views/security/connexion.html.php');
       }elseif($_GET['view']=='inscription') {
        $antecedants=find_all_antecedant();
        require(ROUTE_DIR.'views/security/inscription.html.php');
       }
    }else {
        require(ROUTE_DIR.'views/security/connexion.html.php');
    }
}elseif ($_SERVER['REQUEST_METHOD']=='POST')  {
    if (isset($_POST['action'])) {
       if ($_POST['action']=='connexion') {
           connexion($_POST['login'],$_POST['password']);
       }elseif ($_POST['action']=='inscription') {
        unset($_POST['valider']);
        unset($_POST['controlleurs']);
        unset($_POST['action']);
        inscription($_POST, $_FILES);
       }
}
}

 function connexion( string $login, string $password):void{
     $arrayError=array();
     valide_login($login,'login',$arrayError);
     valide_password($password,'password',$arrayError);
     
      if (form_valid($arrayError)) {
        
        $user = find_user_by_login_password($login , $password);
        if (count($user)==0) {
            $_SESSION['arrayError']= $arrayError;
            header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
            exit();
          }else{
              $_SESSION['userConnect']=$user;
              if ($user['nom_role']=='medecin') {
                header('location:'.WEB_ROUTE.'?controlleurs=medecin&view=liste.rendez-vous');
                exit();
              }elseif($user['nom_role']=='patient') {
                header('location:'.WEB_ROUTE.'?controlleurs=patient&view=mes.rendez-vous');
                exit();
              }elseif($user['nom_role']=='secretaire') {
                header('location:'.WEB_ROUTE.'?controlleurs=secretaire&view=rendez-vous');
                exit();
              }elseif($user['nom_role']=='responsable_prestation') {
                header('location:'.WEB_ROUTE.'?controlleurs=responsable.prestation&view=liste.prestation');
                exit();
              }

          } 
          
       }else {
           $_SESSION['arrayError']=$arrayError;
           header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
           exit();
       }
    }



    function inscription( array $data, array $files):void{
        $arrayError=array();
        extract($data);
         valide_login($login,'login',$arrayError);
         valide_password($password,'password',$arrayError);
         valide_nom($nom,'nom',$arrayError);
         valide_telephone($telephone,'telephone',$arrayError);
         valide_sexe($telephone,'telephone',$arrayError);
         valide_adresse($telephone,'telephone',$arrayError);
         if (form_valid($arrayError)) {
           $user= find_login($login);
           if (count($user)!=0) {
            $arrayError['login']='le login existe deja';
            $arrayError['erreurConnexion']="login ou password incorrect ";
            
            $_SESSION['arrayError']=$arrayError;
            
             header('location:'.WEB_ROUTE.'?controlleurs=security&view=inscription');
             exit();
           }else {
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
            $data['avatar']= $target_file ;
              $id_patient=insert_user($data);
               //$id_user=insert_user( $user);
               foreach ($medicaux as $medical) {
                $id_antecedant_medicaux=(int)$medical;
                insert_user_antecedant($id_patient,$id_antecedant_medicaux);
              } 
              
              valide_image($_FILES, $arrayError, 'avatar', $target_file);
              //upload_image($_FILES, $target_file);
             
              if(count($arrayError) == 0) {
                  if(!upload_image($_FILES, $target_file)) {
                      $arrayError['avatar'] = "Erreur lors de l'upload de l'image";
                      $_SESSION['arrayError']=$arrayError;
                      header('location:'.WEB_ROUTE.'?controlleurs=security&view=inscription');
                      exit();
                }
              }
              header('location:'.WEB_ROUTE.'?controlleurs=security&view=connexion');
            exit();
           }
           
         }else {
             $_SESSION['arrayError']=$arrayError;
             header('location:'.WEB_ROUTE.'?controlleurs=security&view=inscription');
             exit();
    }
    }


    

?>