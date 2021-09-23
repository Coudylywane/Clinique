<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<div class="card h-50">
  <div class="row">
      <h5 class="mt-5 liste" ><?= $title_page?></h5>
      <a href="<?= WEB_ROUTE.'?controlleurs=patient&view=prendre_rendez_vous'?>" class="btn text-light prendre h-25 mt-5 "><i class="bi bi-plus-square-fill " style="margin-left:-30px;margin-right:5%;"></i> Rendez-vous</a>
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
     <form class="form-inline" action="<?=WEB_ROUTE?>" method="POST">
      <input type="hidden" class="form-control" name="controlleurs" value="patient" placeholder="">
       <input type="hidden" class="form-control" name="action"  value="filtre.rendezvous" placeholder="">
    </form>
    </div>
</div>
</div>
<div class="row mt-4 ">
  <div class="col-md-12">
      <div class="card tab ml-5 ">
          <div class="card-header">
            <div class="row">
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
                <div class="form-group ml-4" style="margin-right: 5%;">
                    <label for="">Type Rendez-vous</label>
                    <select class="form-control ml-4" name="type" id="">
                        <option value="consultation">Consultation</option>
                        <option value="prestation">Prestation</option>
                    </select>
                </div>
                <button type="submit" class="btn text-light ml-4" style="width: 13%;margin-top: 2%;"><i class="bi bi-search image"></i>Rechercher</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                          <th scope="col">Type Rendez-vous</th>
                          <th scope="col">Date Rendez-vous</th>
                          <th scope="col">Etat Rendez-vous</th>
                      </tr>   
                    </thead>
                    <tbody>
                        <?php foreach ($rendezs as $key => $rendez):?>
                            <tr>
                                <td><?= $rendez['type_rendezvous']?></td>
                                <td><?=date_format(date_create($rendez['date_rendezvous']),'d-m-Y')?></td>
                                <td><?=$rendez['etat_rendezvous']?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
               </table>
              </div>
              <!-- /.card-body -->
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


