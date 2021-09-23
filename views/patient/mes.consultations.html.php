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
                <input type="hidden" class="form-control" name="action" id="inputName" value="filtre.consultation" placeholder="">
                <div class="row">
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
                <table class="table table-bordered">
                  <thead>
   
                  <tr>
                      <th scope="col">Constantes</th>
                      <th scope="col">Date Consultation</th>
                      <th scope="col">Etat Consultation</th>
                      <th scope="col">Medecin</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($consultations as $key => $consultation):?>
                        <tr>
                          <td><?= $consultation['constantes_consultation']?></td>
                          <td><?=date_format(date_create($consultation['date_consultation']),'d-m-Y')?></td>
                          <td><?=$consultation['etat_consultation']?></td>
                          <td><?=$consultation['nom & prenom']?></td>
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


