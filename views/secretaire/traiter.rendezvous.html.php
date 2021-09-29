<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<div class="card h-50">
  <div class="row">
      <h5 class="mt-5 liste" ><?=$title_page?></h5>
  </div>
</div>
<div class="row" style="margin-left: -31px;">
    <div class="col-md-2">
        <?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>
    </div>
  <div class="profil" style="margin-top: 1%;">
 <div class="container mt-5 ml-5 ">
<div class="row">
  <div class="col-md-4">
    <div class="card" style="width: 735px;">
        <div class="row">
            <div class="col-md-6">
                <h4 class="ml-1">Patient</h4>
                <?php foreach ($rendezvousdetail as $key => $rendezvousd):?>
                  <img class="logos mt-3 ml-5" src="<?=$rendezvousd['avatar']?>" alt="" style="width: 60px;height:60px">
                   <div class="row">
                       <h6 class="ml-5">Nom et Prenom:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['nom & prenom'])?></h6>
                   </div>
                   <div class="row">
                       <h6 class="ml-5">Numero Telephone:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['telephone_user'])?></h6>
                   </div>
                   <div class="row">
                       <h6 class="ml-5">Sexe:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['sexe_user'])?></h6>
                   </div>
                <?php endforeach?>
            </div>
        </div>
      </div> 
      <div class="card mt-3" style="width: 735px;">
        <div class="row">
            <div class="col-md-6">
                <h4 class="ml-1">Detail du Rendez-vous</h4>
                <?php foreach ($rendezvousdetail as $key => $rendezvousd):?>
                   <div class="row">
                       <h6 class="ml-5">Type Rendez-vous:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['type_rendezvous'])?></h6>
                   </div>
                   <div class="row">
                       <h6 class="ml-5">Date Rendez-vous:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['date_rendezvous'])?></h6>
                   </div>
                   <div class="row">
                       <h6 class="ml-5">Heure Rendez-vous:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['heure_rendezvous'])?></h6>
                   </div>
                   <div class="row">
                       <h6 class="ml-5">Medecin:</h6>
                       <h6 class="ml-2"><?=ucfirst($rendezvousd['nom_type_medecin'])?></h6>
                   </div>
                <?php endforeach?>
            </div>
        </div>
      </div> 
      </div>
      <div class="col-md-8">
      <div class="card " style="margin-left: 54%;width: 700px;height: 358px;">
            <div class="row">
                  <div class="col-md-6">
                      <h4 class="ml-1">Medecin Disponible</h4>
                              <div class="form-check ml-3">
                                    <?php foreach ($medecins as $key => $medecin):?>
                                      <div class="row">
                                        <label class="form-check-label ml-5">
                                        <input type="radio" class="form-check-input" name="radio" id="" value="<?=$medecin['id_medecin']?>">
                                        <?=ucfirst($medecin['nom & prenom'])?>
                                        </label>
                                        </div>
                                    <?php endforeach?>
                                </div>
                         
                  </div>
              </div>
      </div>
      </div>
  </div>
        <form action="" method="post">
            <input type="hidden"class="form-control" name="controlleurs" value="secretaire" placeholder="">
            <input type="hidden"class="form-control" name="action" value="valider_rendezvous" placeholder="">
            <input type="hidden"class="form-control" name="etat_rendezvous" value="<?=ucfirst($rendezvousd['etat_rendezvous'])?>" placeholder="">
            <input type="hidden"class="form-control" name="date_rendezvous" value="<?=ucfirst($rendezvousd['date_rendezvous'])?>" placeholder="">
            <input type="hidden"class="form-control" name="type_rendezvous" value="<?=ucfirst($rendezvousd['type_rendezvous'])?>" placeholder="">
            <input type="hidden"class="form-control" name="id_rendezvous"   value="<?=ucfirst($rendezvousd['id_rendezvous'])?>"   placeholder="">
            <input type="hidden"class="form-control" name="nom_prestation"  value="<?=ucfirst($rendezvousd['nom_prestation'])?>"   placeholder="">                        
            <input type="hidden"class="form-control" name="id_medecin" value="<?=$medecin['id_user']?>" placeholder="">

            <div class="mt-5" style="margin-left:32%">
                <button type="submit" style="margin-left:35%;" class="btn btn-primary" name="traiter" value="annuler">Annuler</button>
                <button type="submit" class="btnnss primary" name="traiter" value="valider">Valider</button>
            </div>
      
        </form>
</div>
</div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  
<style>
  .btnnss{
  background-color:  #00BFFF;
  border-radius: 5px; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width: 10%;
  height: 40px;
  margin-left: 78px;
 
}

</style>



