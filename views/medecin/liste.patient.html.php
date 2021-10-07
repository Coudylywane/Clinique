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
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col-md-10 ml-auto " style="margin-top: -50%;">
    <div class="row">
    <?php foreach ($patients as $patient):?>

       <div class="col-md-3" style="margin-left: 5%;">
            <div class="card mt-3">                               
                <div class="card-body" style="width: 10rem;height: 120px;">                                                     
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= $patient['avatar']?>" alt="user" class="rounded-circle" style="width: 50px;height:50px">
                        </div><!--end media--> 
                        <div class="media-body ms-3 align-self-center ml-2" >
                            <p class="" style="margin-left: 40px;"><?= $patient['nom & prenom']?></p> 
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.$patient['id_user']?>" class="text-light btnss" style="width: 100%; margin-left:60px;margin-top:-25px;text-decoration:none;"><i class="bi bi-link"></i> Detail</a>
                        </div>
                    </div><!--end row-->
                </div><!--end card-body-->                                                                     
            </div><!--end card-->
        </div><!--end col-->       
        <?php endforeach?>  
       
    </div>
    <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.patient&page='. ($currentPage - 1) ?>" class="page-link"> «Précédente</a>
                  </li>
                   <?php for($i=1;$i<=$pages;$i++):?>
                     <li class="page-item"><a class="page-link" href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.patient&page='.$i?>"><?=$i?></a></li>
                  <?php endfor ?>
                 
                       <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=liste.patient&page='.($currentPage + 1) ?>" class="page-link">»Suivante</a>
                        </li>
                </ul>
              </div>
  </div>
</div>
</div>
</div>
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


