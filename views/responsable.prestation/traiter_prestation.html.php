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
    <div class="profil col-md-10" style="margin-top: 1%;">
        <div class="container mt-5 ml-5 ">
        <div class="row">
  <div class="col-md-4">
    <div class="card" style="width: 735px;">
        <div class="row">
            <div class="col-md-6">
                <h4 class="ml-1">Patient</h4>
                 <?php foreach ($details as $key => $detail):?>
                                    <img class="logos mt-3 ml-5" src="<?=$detail['avatar']?>" alt="" style="width: 60px;height:60px">
                                    <div class="row">
                                        <h6 class="ml-5">Nom et Prenom:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['nom & prenom'])?></h6>
                                    </div>
                                    <div class="row">
                                        <h6 class="ml-5">Numero Telephone:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['telephone_user'])?></h6>
                                    </div>
                                    <div class="row">
                                        <h6 class="ml-5">Sexe:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['sexe_user'])?></h6>
                                    </div>
                                    <?php endforeach?> 
            </div>
        </div>
      </div> 
      <div class="card mt-3" style="width: 735px;">
        <div class="row">
            <div class="col-md-6">
                <h4 class="ml-1">Detail du Rendez-vous</h4>
                     <?php foreach ($details as $key => $detail):?>
                                    <div class="row">
                                        <h6 class="ml-5">Type Rendez-vous:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['type_rendezvous'])?></h6>
                                    </div>
                                    <div class="row">
                                        <h6 class="ml-5">Date Rendez-vous:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['date_rendezvous'])?></h6>
                                    </div>
                                    <div class="row">
                                        <h6 class="ml-5">Heure Rendez-vous:</h6>
                                        <h6 class="ml-2"><?=ucfirst($detail['heure_rendezvous'])?></h6>
                                    </div>
                                    <?php endforeach?> 
            </div>
        </div>
      </div> 
      </div>
      <div class="col-md-8">
      <div class="card " style="margin-left: 54%;width: 700px;">
            <div class="row">
                  <div class="col-md-6">
                      <h4 class="ml-1">Image Prestation</h4>
                      <form action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                            <div class="mb-3 ml-5 col-md-5">
                                    <label for="formFile" class="form-label"></label>
                                    <input class="form-control " name="images[]" type="file" id="formFile" style="width: 436%;" >
                            </div>
                            <div class="col-md-1">
                                   <button type="button" class="btn btn-primary" onclick="addField()" style="margin-left: 413px;width: 53px;margin-top: 20px;">+</button>
                            </div>
                      </div>
                      <div id="fields">
                      </div>
            <input type="hidden" name="controlleurs" value="responsable.prestation" placeholder="">
            <input type="hidden" name="action" value="traiter_prestations" placeholder="">
            <input type="hidden"class="form-control" name="id_prestation" value="<?=($detail['id_prestation'])?>" placeholder="">
            <button type="submit" class="btnss primary text-light mt-4" style="width: 20%;margin-left:35%;" name="traiter" value="valide" >Valider</button>
            <script>
               function addField(){
               var field = "<div class='mb-3 ml-4 col-md-5'><input class='form-control' type='file'  name='images[]' id='formFile[]' style='width: 480%;'></div>";
               document.getElementById('fields').innerHTML += field;
             }
           </script>
      
             </form>
                  </div>
                 
              </div>
             
      </div>
      </div>

  </div>
           <form action="" method="post">
            <input type="hidden" name="controlleurs" value="responsable.prestation" placeholder="">
            <input type="hidden" name="action" value="traiter_prestations" placeholder="">
            <input type="hidden"class="form-control" name="id_prestation" value="<?=($detail['id_prestation'])?>" placeholder="">

            <div class="mt-5" style="margin-left:32%">
                <button type="submit" style="margin-left:20%;" class="btn btn-primary" name="traiter" value="annule"  >Annuler</button>
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



<div class="card" style="width:528px" >
                                <h4 class="ml-1">Patient</h4>
                                
                    </div>


                   