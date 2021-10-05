<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<div class="card h-50">
  <div class="row">
      <h5 class="mt-5 liste" ><?=$title_page?></h5>
      <a href="<?= WEB_ROUTE.'?controlleurs=patient&view=prendre_rendez_vous'?>" class="btn text-light prendre h-25 mt-5 "><i class="bi bi-plus-square-fill " style="margin-left:-30px;margin-right:5%;"></i> Rendez-vous</a>
  </div>
</div>
<div class="row" style="margin-left: -31px;">
    <div class="col-md-2">
        <?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>
    </div>
  <div class="col-md-10" style="margin-top: 1%; padding-left:2%">
 
        <div class="row">
        <div class="col-md-6">
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?=$class_consultation?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consultation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?=$class_prestation?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Prestation</a>
                                    </li>
                                
                            </ul>
                    
                    
                        <div class="tab-content" id="myTabContent" style="padding-left: 15px;"> 
                            <div class="tab-pane fade show <?=$class_consultation?>" id="home" role="tabpanel" aria-labelledby="home-tab">
        
                                    <table class="table">
                                        <thead>
                                        <tr>
                                                <th scope="col">Date Consultation</th>
                                                <th scope="col">Etat Consultation</th>
                                                <th scope="col">Medecin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($consultations as $key => $consultation):?>
                                                    <tr>
                                                    <td><?=date_format(date_create($consultation['date_consultation']),'d-m-Y')?></td>
                                                    <td><?=$consultation['etat_consultation']?></td>
                                                    <td><?=$consultation['nom & prenom']?></td>
                                                    </tr>
                                                <?php endforeach?>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-sm mx-0 float-right ">
                                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                                <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='. ($currentPage - 1).'&lien=consultation' ?>" class="page-link"> «Précédente</a>
                                            </li>
                                    <?php for($i=1;$i<=$pages;$i++):?>
                                        <li class="page-item">
                                           <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='. $i.'&lien=consultation'?>" class="page-link"> <?=$i?></a>
                                        </li>
                                    <?php endfor ?>
                                    
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                                <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='.($currentPage + 1).'&lien=consultation' ?>" class="page-link">»Suivante</a>
                                            </li>
                                </ul> 
                            </div>
                            <div class="tab-pane fade show <?=$class_prestation?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

                                <ul class="pagination pagination-sm mx-0 float-right ">
                                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                                <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='. ($currentPage - 1).'&lien=prestation' ?>" class="page-link"> «Précédente</a>
                                            </li>
                                    <?php for($i=1;$i<=$pages;$i++):?>
                                        <li class="page-item">
                                           <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='. $i.'&lien=prestation'?>" class="page-link"> <?=$i?></a>
                                        </li>
                                    <?php endfor ?>
                                    
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                                <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.($_SESSION['id_patient']).'&page='.($currentPage + 1).'&lien=prestation' ?>" class="page-link">»Suivante</a>
                                            </li>
                                </ul> 
                            </div>
                        
                        </div>
                </div> 
            </div>
            <div class="col-md-5 mr-1">
                <div class="card w-100 " >
                        <?php require_once(ROUTE_DIR.'views/medecin/inc/ajout.consultation.html.php')?>
                </div>
            </div>
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



