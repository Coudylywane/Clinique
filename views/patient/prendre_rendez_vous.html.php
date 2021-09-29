<?php 

if (isset($_SESSION['arrayError'])) {
   $arrayError=$_SESSION['arrayError'];
   unset($_SESSION['arrayError']);
}
?>

<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<div class="card h-50">
  <div class="row">
      <h5 class="mt-5 liste" ><?= $title_page?></h5>
  </div>
</div>
<div class="row" style="margin-left: -31px;">
    <div class="col-md-2">
        <?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>
    </div>
  <div class="profil" style="margin-top: 1%;">
 <div class="container mt-5 ml-5 ">
<div class="row">

    <div class="col-md-offset-3">
    <!-- formulaire -->
    </div>
</div>
</div>
<div class="row mt-4 ">
  <div class="col-md-12">
      <div class="card tab ml-5 ">
          
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=WEB_ROUTE?>" method="post"  enctype="multipart/form-data" class="" style="margin-top: 10%;">
                      <input type="hidden" name="controlleurs" value="patient"/>
                      <input type="hidden" name="action" value="prendre_rendez_vous"/>
                    <div class=" ml-5 tout">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for=""> Type Rendez-vous </label>
                        <select class="form-control primary" name="type_rendezvous">
                          <option class="text-center" value="0">Entrer le type du rendez-vous</option>
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
                            <select class="form-control primary" name="type_medecin">
                                <option class="text-center" value="">Entrer le type de medecin</option>
                                <?php  foreach ($type_rendezvous as $value):?>
                                <option class="color" value="<?= $value['id_type_medecin']?>"><?=$value['nom_type_medecin']?></option> 
                                <?php endforeach?>
                            </select>
                     </div>
                     <div class="form-group ml-5 w-75 text-left">
                        <label for="">Nom prestation</label>
                            <select class="form-control primary" name="nom_prestation">
                                <option class="text-center" value="">Entrer le nom de la prestation</option>
                                <option class="color" value="radiographie">Radiographie</option> 
                                <option class="color" value="echographie">Echographie</option> 
                            </select>
                     </div>
                    <div class="text-center ">
                        <button type="submit" class=" btn text-light" name="annuler" style="background-color: #00BFFF ;">Annuler</button>
                        <button type="submit" class=" bouton text-light" name="submit" style="background-color: #1e293b ;">Valider</button>
                       
                    </div>
                    </form>
                <!-- table -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


