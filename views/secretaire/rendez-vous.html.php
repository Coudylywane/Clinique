<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<style>
  .inline {
    display: contents;
}
</style>
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
</div>
</div>
<div class="row mt-4 ">
  <div class="col-md-12">
      <div class="card tab ml-5 ">
          <div class="card-header">
          <form class="form-inline" action="<?=WEB_ROUTE?>" method="POST">
                  <input type="hidden" class="form-control" name="controlleurs" value="secretaire" placeholder="">
                  <input type="hidden" class="form-control" name="action"  value="filtre.les.rendezvous" placeholder="">
                      <div class="row inline">
                            <div class="form-group ml-4">
                                <label for="">Date</label>
                                <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group ml-4">
                                <label for="">Etat</label>
                                <select class="form-control ml-4" name="etat" id="">
                                    <option value="valider">Valider</option>
                                    <option value="annuler">Annuler</option>
                                    <option value="en cour">En cour</option>
                                </select>
                          </div>
                          
                          <div class="form-group ml-4" style="margin-right: 2%;">
                              <label for="">Type Rendez-vous</label>
                              <select class="form-control ml-4" name="type" id="">
                                  <option value="consultation">Consultation</option>
                                  <option value="prestation">Prestation</option>
                              </select>
                          </div>
                          <div class="form-group ml-4">
                              <button type="submit" class="btn text-light ml-4" style="width: 100%;margin-top: 2%; "><i class="bi bi-search image"></i>Rechercher</button>
                          </div>
                          
                    </div>
                    
              </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                  <thead>
   
                  <tr>
                      <th scope="col" style="width: 15%;">Type Rendez-vous</th>
                      <th scope="col" style="width: 15%;">Date Rendez-vous</th>
                      <th scope="col" style="width: 15%;">Heure Rendez-vous</th>
                      <th scope="col" style="width: 15%;">Etat Rendez-vous</th>
                      <th scope="col" class="w-25">Type Medecin</th>
                      <th scope="col" style="width: 20%;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($rendezvous as $key => $vous):?>
                        <tr>
                          <td><?= ucfirst ($vous['type_rendezvous'])?></td>
                          <td><?=date_format(date_create($vous['date_rendezvous']),'d-m-Y')?></td>
                          <td><?=date_format(date_create($vous['heure_rendezvous']),'h:i:s')?></td>
                          <td><?=ucfirst($vous['etat_rendezvous'])?></td>
                          <td><?=ucfirst($vous['nom_type_medecin'])?></td> 
                          <td >
                            <a href="<?= WEB_ROUTE.'?controlleurs=patient&view=prendre_rendez_vous'?>" class="text-light btns"><i class="bi bi-link"></i> Traiter</a>
                        </td>
                        </tr>
                      <?php endforeach?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  

<style>
  .action{
    background-color: #00BFFF;
  }



 
</style>
