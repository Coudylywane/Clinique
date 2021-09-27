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
              <input type="hidden" class="form-control" name="controlleurs" id="inputName" value="patient" placeholder="">
              <input type="hidden" class="form-control" name="action" id="inputName" value="filtre.prestation" placeholder="">
              <div class="row ">
              <div class="form-group ml-4">
                    <label for="">Date</label>
                    <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
                </div>
              <div class="form-group ml-4">
                      <label for="">Etat</label>
                      <select class="form-control ml-4" name="etat" id="">
                        <option value="deja fait">Deja fait</option>
                        <option value="pas fait">Pas fait</option>
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
                      <th scope="col">Nom prestation</th>
                      <th scope="col">Etat Prestation</th>
                      <th scope="col">Date Prestation</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($prestations as $key => $prestation):?>
                  <tr>
                    <td><?= $prestation['nom_prestation']?></td>
                      <td><?=$prestation['etat_prestation']?></td>
                      <td><?=date_format(date_create($prestation['date_prestation']),'d-m-Y')?></td>
                  </tr>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.prestations&page='. ($currentPage - 1) ?>" class="page-link"> «Précédente</a>
                  </li>
                   <?php for($i=1;$i<=$pages;$i++):?>
                     <li class="page-item"><a class="page-link" href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.prestations&page='.$i?>"><?=$i?></a></li>
                  <?php endfor ?>
                 
                       <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.prestations&page='.($currentPage + 1) ?>" class="page-link">»Suivante</a>
                        </li>
                </ul>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


