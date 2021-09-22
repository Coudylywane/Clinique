<?php 

if (isset($_SESSION['arrayError'])) {
   $arrayError=$_SESSION['arrayError'];
   unset($_SESSION['arrayError']);
}
?>

<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
  
<body>
    
         <div>
              <div class="container">
                <form action="<?=WEB_ROUTE?>" method="post"  enctype="multipart/form-data">
                      <input type="hidden" name="controlleurs" value="patient"/>
                      <input type="hidden" name="action" value="prendre_rendez_vous"/>
                   <img class="w-25 h-25 logo " src="<?=WEB_ROUTE.'image/logo.png'?>" alt="logo">
                    <div class=" ml-5 tout">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for=""> Type Rendez-vous </label>
                        <select class="form-control primary" name="type_rendezvous">
                          <option class="text-center" value="">Entrer le type du rendez-vous</option>
                          <option class="color" value="consultation">Consultation</option>
                          <option class="color" value="prestation">Prestation</option>
                        </select>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Date Rendez-vous</label>
                        <input type="date" class="form-control primary " name="date" id="login" aria-describedby="helpId" >
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['date']) ? $arrayError['date']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Heure Rendez-vous</label>
                        <input type="time" class="form-control primary " name="heure" id="login" aria-describedby="helpId" >
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['heure']) ? $arrayError['heure']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Type de Medecin</label>
                            <select class="form-control primary" name="medecin">
                                <option class="text-center" value="">Entrer le type de medecin</option>
                                <?php  foreach ($type_rendezvous as $value):?>
                                <option class="color" value="<?= $value['id_user']?>"><?=$value['nom_type_medecin']?></option> 
                                <?php endforeach?>
                            </select>
                     </div>
                    <div class="text-center ">
                        <button type="submit" class="btn" name="submit">Valider</button>
                        <button type="submit" class="bouton" name="annuler">Annuler</button>
                       
                    </div>
                    </form>
        
              </div>
            </div>
         </div>
    
         <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?> 

