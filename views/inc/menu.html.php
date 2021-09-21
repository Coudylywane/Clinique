<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
    


<nav class="navbar navbar-expand-md navbar-light ">
    <button class="navbar-toggler d-lg-none  d-md-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      
        <ul class="nav flex-column mr-auto mt-2 mt-lg-0">
            <div class="profile">
            <img class="logos mt-3 ml-5" src="upload/masque.png" alt="">
            <h6 class="text-center">Nom & Prenom</h6>

            <?php if (est_patient()):?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.rendez-vous'?>"><i class="bi bi-list-ul image"></i>Mes Rendez-vous</a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.consultations'?>"><i class="bi bi-list-ul image"></i>Mes Consultations</a>
                    
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=patient&view=mes.prestations'?>"><i class="bi bi-list-ul image"></i>Mes Prestations</a>
                    
                </li>
            <?php endif?>
            <?php if (est_medecin()):?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>"><i class="bi bi-card-list image"></i>Liste Rendez-vous</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=admin&view=liste.admin'?>"><i class="bi bi-card-list image"></i>Listes Consultations</a>
                </li>
           
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=admin&view=tableau.bord'?>"> <i class="bi bi-bar-chart-fill image"></i>Tableau de bord</a>
                </li>
            <?php endif?>
            <?php if (est_secretaire()):?>
            <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>"><i class="bi bi-card-list image"></i>Liste Rendez-vous</a> 
            </li>
            <?php endif?>

            <?php if (est_responsable_prestation()):?>
            <li class="nav-item">
                    <a class="nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>"><i class="bi bi-card-list image"></i>Liste Prestations</a> 
            </li>
            <?php endif?>




                <a class=" nav-link text-light" href="<?= WEB_ROUTE.'?controlleurs=security&view=deconnexion'?>"><i class="bi bi-box-arrow-in-left image"></i>Se deconnecter</a>
            </div>


           
        </ul>
        
       
    </div>
</nav>
<?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>


<style>
    .profile{
        height: 652px;
        width: 310px; 
        border-radius: 3%;
        background-color:#80DFFE;
      
    }
    .image{
        float: left;
        color: white;
        width: 40px;
        height: 40px;
       
        
    }

    
nav{
    width: 250px;
    margin-top: 3%;
}
.nav-item a{
    color: black;
}
.nav-item a:hover{
    background-color: grey;
}

    
.suivant {
    margin-left: 73%;
    margin-top: -5px;

}

.ava{
    margin-left: 2%;
}

.coudy{
    margin-top: -18%;
}

</style>



