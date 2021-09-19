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
                <form action="<?=WEB_ROUTE?>" method="post">
                      <input type="hidden" name="controlleurs" value="security"/>
                      <input type="hidden" name="action" value="inscription"/>
                      <input type="hidden" name="action" value="<?= isset($user['id'])?'edit':'inscription';?>"/>
                   <img class="w-25 h-25 logo " src="<?=WEB_ROUTE.'image/logo.png'?>" alt="logo">
                    <div class=" ml-5 tout">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Nom & Prenom</label>
                        <input type="text" class="form-control primary " name="nom" id="login" aria-describedby="helpId" >
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['nom']) ? $arrayError['nom']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Sexe</label>
                        <select class="form-control primary" name="sexe">
                          <option class="text-center">Entrer votre sexe</option>
                          <option class="color">Homme</option>
                          <option class="color">Femme</option>
                        </select>
                      </div>
                     
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Telephone</label>
                        <input type="text" class="form-control primary " name="telephone" id="login" aria-describedby="helpId" >
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['telephone']) ? $arrayError['telephone']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5  w-75 text-left ">
                        <label for="">Adresse</label>
                        <input type="text" class="form-control primary" name="adresse" id="password" aria-describedby="helpId" >
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['adresse']) ? $arrayError['adresse']: '';?> 
                        </small>
                      </div>
                      <label for="" class="ml-5 mb-3">Antecedant Medicaux</label>
                        <div class="row ml-5">
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="medicaux[]" id="" value="checkedValue" >
                                    Diabete
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="medicaux[]" id="" value="checkedValue">
                                   Hypertension
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="medicaux[]" id="" value="checkedValue" >
                                    Hepatite
                                </label>
                            </div>
                        </div>
                        <div class="form-group ml-5 mt-4 w-75 text-left ">
                            <label for="">login</label>
                            <input type="text" class="form-control primary" name="login" id="password" aria-describedby="helpId" >
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
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                    </div>
                    <div class="form-group ml-5 w-75 text-left">
                        <label for="">Avatar</label>
                        <input type="file" class="form-control primary " name="avatar" id="login" aria-describedby="helpId" >
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>

                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn" name="valider">Valider</button>
                        <button type="submit" class="bouton" name="annuler">Annuler</button>
                       
                    </div>
                    </form>
        
              </div>
            </div>
         </div>
    
         <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?> 
<style>
  .image{
   background-image: url('image/3.png');

  }
</style>
