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
  <div class="col-md-10 ml-5">
  <?php foreach ($patients as $patient):?>
    <div class="row">
       <div class="col-md-5">
            <div class="card"style="width: 500px;">                               
                <div class="card-body" style="width: 200px;">                                                     
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= $patient['avatar']?>" alt="user" class="rounded-circle" style="width: 50px;height:50px">
                        </div><!--end media--> 
                        <div class="media-body ms-3 align-self-center ml-3" style="width: 200px; margin-left:20%">
                            <h5 class="ml-5"><?= $patient['nom & prenom']?></h5> 
                            <a href="<?= WEB_ROUTE.'?controlleurs=medecin&view=consulter&id_patient='.$patient['id_user']?>" class="text-light btnss" style="width: 100%; margin_left:50px;text-decoration:none;"><i class="bi bi-link"></i> Detail</a>
                        </div>
                    </div><!--end row-->
                </div><!--end card-body-->                                                                     
            </div><!--end card-->
        </div><!--end col-->              
    </div>
    <?php endforeach?>  
  </div>
</div>
</div>
</div>
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


