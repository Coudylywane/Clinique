<?php 
if (isset($_SESSION['arrayError'])) {
   $arrayError=$_SESSION['arrayError'];
   unset($_SESSION['arrayError']);
}
?>

<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
  
<body>
    
         <div>
            <div class="row hhhh">
              <div class="col-md-6 image">
              </div>
              <style>
                
              </style>
              <div class="col-md-6 ">
                <form action="<?=WEB_ROUTE?>" method="post"  enctype="multipart/form-data">
                      <input type="hidden" name="controlleurs" value="security"/>
                      <input type="hidden" name="action" value="inscription"/>
                      <input type="hidden" name="action" value="<?= isset($user['id'])?'edit':'inscription';?>"/>
                   <img class="w-25 h-25 logo " src="<?=WEB_ROUTE.'image/logo.png'?>" alt="logo">
                    <div class=" ml-5 tout">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Nom & Prenom</label>
                        <input type="text" class="form-control primary " name="nom" id="login" aria-describedby="helpId" value="<?=isset($_SESSION['restore'])?$_SESSION['restore']['nom']:''?>">
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['nom']) ? $arrayError['nom']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Sexe</label>
                        <select class="form-control primary" name="sexe">
                          <option class="text-center" value="">Entrer votre sexe</option>
                          <option class="color" value="homme">Homme</option>
                          <option class="color" value="femme">Femme</option>
                        </select>
                      </div>
                     
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Telephone</label>
                        <input type="text" class="form-control primary " name="telephone" id="login" aria-describedby="helpId" value="<?=isset($_SESSION['restore'])?$_SESSION['restore']['telephone']:''?>">
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['telephone']) ? $arrayError['telephone']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5  w-75 text-left ">
                        <label for="">Adresse</label>
                        <input type="text" class="form-control primary" name="adresse" id="password" aria-describedby="helpId" value="<?=isset($_SESSION['restore'])?$_SESSION['restore']['adresse']:''?>">
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['adresse']) ? $arrayError['adresse']: '';?> 
                        </small>
                      </div>
                      <label for="" class="ml-5 mb-3">Antecedant Medicaux</label>
                        <div class="row ml-5">
                            <div class="form-check ml-3">
                            <?php foreach ($antecedants as $antecedant):?>
                                <div class="row">
                                  <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input " name="medicaux[]" id="" value="<?=$antecedant['id_antecedant_medecaux']?>" value="<?=isset($_SESSION['restore'])?$_SESSION['restore']['medicaux[]']:''?>">
                                  <?=$antecedant['nom_antecedant_medecaux']?>
                                  </label>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        <div class="form-group ml-5 mt-4 w-75 text-left ">
                            <label for="">Login</label>
                             <input type="text" class="form-control primary" name="login" id="password" aria-describedby="helpId"  value="<?=isset($_SESSION['restore'])?$_SESSION['restore']['login']:''?>">
                            <small class="form-text text-danger">
                          <?php echo isset($arrayError['login']) ? $arrayError['login']: '';?> 
                        </small>
                      </div>
                      <div class="row ml-1 marge">
                            <div class="form-group ml-5 mt-4 text-left ">
                                <label for="">Password</label>
                                <input type="password" class="form-control primary w" name="password" id="password" aria-describedby="helpId" >
                                <small class="form-text text-danger">
                          <?php echo isset($arrayError['password']) ? $arrayError['password']: '';?> 
                        </small>
                            </div>
                            <div class="form-group ml-5 mt-4  text-left ">
                                <label for="" class="marges">Confirm Password</label>
                                <input type="password" class="form-control primary we" name="password2" id="password" aria-describedby="helpId" >
                                <small class="form-text text-danger">
                          <?php echo isset($arrayError['password2']) ? $arrayError['password2']: '';?> 
                        </small>
                            </div>
                    </div>
                    <div class="form-group ml-5 w-75 text-left">
                        <label for="">Avatar</label>
                        <input type="file" class="form-control primary " name="avatar" id="login" aria-describedby="helpId" value="Upload Image">
                        <?php if(isset($arrayError['avatar'])): ?>
                        <small id="imagelHelp" class="form-text text-danger">
                            <?= $arrayError['avatar'] ?>
                        </small>
                       <?php endif; ?>
                      </div>

                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn text-light" name="valider">Valider</button>
                    <div class="comptes">
                        <a href="<?= WEB_ROUTE.'?controlleurs=security&view=connexion'?>" style="margin-top: 25px;">Se connecter</a>
                   </div>                       
                    </div>
                    </form>
        
              </div>
            </div>
         </div>
        <?php  unset($_SESSION['restore']) ?>
         <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?> 
         
<style>
  .image{
   background-image: url('image/3.png');

  }

  .comptes{
    position: relative;
    top: 10px;
  }
</style>
