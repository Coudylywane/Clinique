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
                  <input type="hidden" class="form-control" name="controlleurs" value="medecin" placeholder="">
                  <input type="hidden" class="form-control" name="action"  value="filtre.consultation" placeholder="">
                      <div class="row inline">
                            <div class="form-group ml-4">
                                <label for="">Date</label>
                                <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group ml-4">
                                <label for="">Etat</label>
                                <select class="form-control ml-4" name="etat" id="">
                                    <option value="pas fait">Pas fait</option>
                                    <option value="deja fait">Deja fait</option>
                                    <option value="annuler">Annuler</option>
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
                      <th scope="col">Date Consultation</th>
                      <th scope="col">Etat Consultation</th>
                      <th scope="col">Action</th>

                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($medecin_rendezvous as $key => $valous):?>
                        <tr>
                          <td><?=date_format(date_create($valous['date_consultation']),'d-m-Y')?></td>
                          <td><?=ucfirst($valous['etat_consultation'])?></td>
                          <td>
                            <div class="row">
                              <div class="col-m-6" style="margin-left: 20px;">
                              <?php if ($valous['etat_consultation']!='annuler'):?>
                                <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.$valous['id_patient'].'&id_consultation='.$_SESSION['id_consultation']?>" class="text-light btnss" style="width: 100%; margin_left:50px;text-decoration:none;"><i class="bi bi-link"></i> Consulter</a>
                                <?php endif?>

                              </div>
                              <div class="col-m-6">
                                <form action="" method="post">
                                  <input type="hidden" class="form-control" name="controlleurs" value="medecin" placeholder="">
                                  <input type="hidden" class="form-control" name="action"  value="annuler" placeholder="">
                                  <input type="hidden" class="form-control" name="id_consultation"  value="<?=$valous['id_consultation']?>" placeholder="">
                                  <?php 
                                  $id_consultation=$valous['id_consultation'];
                                  $_SESSION['id_consultation']=$id_consultation;
                                  ?>
                                   <button type="submit" class="btns primary text-light" style="width: 100%;margin-left:50px;">Annuler</button>
                                </form>
                              </div>
                            </div>
                            
                        </td>
                        </tr>
                      <?php endforeach?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.consultation&page='. ($currentPage - 1) ?>" class="page-link"> «Précédente</a>
                  </li>
                   <?php for($i=1;$i<=$pages;$i++):?>
                     <li class="page-item"><a class="page-link" href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.consultation&page='.$i?>"><?=$i?></a></li>
                  <?php endfor ?>
                 
                       <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.consultation&page='.($currentPage + 1) ?>" class="page-link">»Suivante</a>
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
  .action{
    background-color: #00BFFF;
  }



 
</style>
