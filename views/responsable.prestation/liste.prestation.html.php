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
          <div class="card-header">
            <div class="row">
            <form class="form-inline" method="POST">
              <input type="hidden" class="form-control" name="controlleurs" id="inputName" value="responsable.prestation" placeholder="">
              <input type="hidden" class="form-control" name="action" id="inputName" value="filtre.les.prestations" placeholder="">
              <div class="row ">
              <div class="form-group ml-4">
                    <label for="">Date</label>
                    <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
                </div>
              <div class="form-group ml-4">
                      <label for="">Etat</label>
                      <select class="form-control ml-4" name="etat" id="">
                        <option value="valider">Valider</option>
                        <option value="en cour">En cours</option>
                        <option value="annuler">Annuler</option>
                      </select>
                </div>
                <div>
                <button type="submit" class="btn text-light ml-4" style="width: 100%;margin-top: 2%;"><i class="bi bi-search image"></i>Rechercher</button>
                </div>
                </div>
            </form>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- table -->
                <table class="table table-bordered">
                <thead>
   
                    <tr>
                      <th scope="col" style="width: 15%;">Date Rendez-vous</th>
                      <th scope="col" style="width: 15%;">Heure Rendez-vous</th>
                      <th scope="col" style="width: 15%;">Etat Rendez-vous</th>
                      <th scope="col" style="width: 20%;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($prests as $key => $prest):?>
                  <tr>
                      <td><?=date_format(date_create($prest['date_rendezvous']),'d-m-Y')?></td>
                      <td><?=date_format(date_create($prest['heure_rendezvous']),'H:i')?></td>
                      <td><?=$prest['etat_rendezvous']?></td>
                      <td>
                            <a href="<?= WEB_ROUTE.'?controlleurs=responsable.prestation&view=traiter_prestation&id_rendezvous='.$prest['id_rendezvous']?>" class="text-light btnns"><i class="bi bi-link"></i> Traiter</a>

                        </td>
                  </tr>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=responsable.prestation&view=liste.prestation&page='. ($currentPage - 1) ?>" class="page-link"> «Précédente</a>
                  </li>
                   <?php for($i=1;$i<=$pages;$i++):?>
                     <li class="page-item"><a class="page-link" href="<?= WEB_ROUTE.'?controlleurs=responsable.prestation&view=liste.prestation&page='.$i?>"><?=$i?></a></li>
                  <?php endfor ?>
                 
                       <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=responsable.prestation&view=liste.prestation&page='.($currentPage + 1) ?>" class="page-link">»Suivante</a>
                        </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


<style>
  .btnns{
  background-color: #1e293b;
  border-radius: 5px; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width: 25%;
 
}

.btnnss{
  background-color:  #00BFFF;
  border-radius: 5px; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width: 25%;
  margin-left: 35px;
 
}
</style>