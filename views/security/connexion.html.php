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
              <div class="text-center mt-5 text-secondary">
              <h4>Bienvenue dans notre plateforme Medical </h4>
              <h5>Une plateforme securisée et qui vous permet d’avoir
                  des rendez-vous sans bouger de chez vous et 
                    aussi de suivre vos patients </h5>
              </div>
              </div>
              <style>
                
              </style>
              <div class="col-md-6 text-center center">
                <form action="<?=WEB_ROUTE?>" method="post">
                      <input type="hidden" name="controlleurs" value="security"/>
                      <input type="hidden" name="action" value="connexion"/>
                   <img class="logo mt-3 ml-5" src="image/logo.png" alt="" style="width: 200px; height:200px; margin-top:-12%;">
                   <?php if (isset($arrayError['erreurConnexion'])):?>
                            <div class="alert alert-primary " role="alert">
                            <strong><?php echo isset($arrayError['erreurConnexion']) ? $arrayError['erreurConnexion']: '';?> </strong>
                            </div>
                            <?php endif ?>
                    <div class="mt-5 ml-5">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control primary " name="login" id="login" aria-describedby="helpId" placeholder="Entrer votre email">
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['login']) ? $arrayError['login']: '';?> 
                        </small>
                      </div>
                      <div class="form-group ml-5  w-75 text-left ">
                        <label for="">Password</label>
                        <input type="password" class="form-control primary" name="password" id="password" aria-describedby="helpId" placeholder="Entrer votre mot de passe">
                        <small class="form-text text-danger">
                          <?php echo isset($arrayError['password']) ? $arrayError['password']: '';?> 
                        </small>                      
                      </div>
                    </div>
                    <button type="submit" class="btnn primary" name="btn_submit">Se connecter</button>
                   <a href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>" iprclass="ml-5 compte">Creer compte</a>
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
