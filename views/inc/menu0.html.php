<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>


<div class="container-fluid">
            <div class="row">
                <img class="logo mt-3 ml-5" src="image/logo.png" alt="">

                <?php if (est_patient()):?>
                <h3 class="slogan"> Il faut avoir beaucoup de patience pour apprendre a etre patient</h3>
                <?php endif?>

                <?php if (est_medecin()):?>
                <h3 class="slogan"> Les meilleurs médecins sont le docteur diète, le docteur tranquille et le docteur joyeux. </h3>
                <?php endif?>

                <?php if (est_secretaire()):?>
                <h3 class="slogan">Bienvenue chére Secretaire</h3>
                <?php endif?>

                <?php if (est_responsable_prestation()):?>
                <h3 class="slogan">Bienvenue chére Responsable des prestations </h3>
                <?php endif?>
            </div>
            <div>
            <?php if (est_medecin()):?>
            <button type="submit" class=" primary prendre " name="btn_submit"><i class="bi bi-plus-square-fill"></i> Planifier Rendez-vous</button>
            <?php endif?>
           </div>
          
      </div>

<?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>