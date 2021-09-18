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
                   <img class="w-25 h-25 logo " src="<?=WEB_ROUTE.'image/logo.png'?>" alt="logo">
                    <div class=" ml-5 tout">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control primary " name="" id="login" aria-describedby="helpId" placeholder="Entrer votre email">
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control primary " name="" id="login" aria-describedby="helpId" placeholder="Entrer votre email">
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control primary " name="" id="login" aria-describedby="helpId" placeholder="Entrer votre email">
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>
                      <div class="form-group ml-5  w-75 text-left ">
                        <label for="">Password</label>
                        <input type="text" class="form-control primary" name="" id="password" aria-describedby="helpId" placeholder="Entrer votre mot de passe">
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>
                      <label for="" class="ml-5 mb-3">Antecedant Medicaux</label>
                        <div class="row ml-5">
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="" id="" value="checkedValue" checked>
                                    Diabete
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="" id="" value="checkedValue" checked>
                                   Hypertension
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="form-check-input " name="" id="" value="checkedValue" >
                                    Hepatite
                                </label>
                            </div>

                        </div>
                        <div class="form-group ml-5 mt-4 w-75 text-left ">
                            <label for="">Password</label>
                            <input type="text" class="form-control primary" name="" id="password" aria-describedby="helpId" placeholder="Entrer votre mot de passe">
                            <small id="helpId" class="form-text text-muted"></small>
                      </div>
                      <div class="row ml-1 marge">
                            <div class="form-group ml-5 mt-4 text-left ">
                                <label for="">Password</label>
                                <input type="text" class="form-control primary w " name="" id="password" aria-describedby="helpId" placeholder="Entrer votre mot de passe">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group ml-5 mt-4  text-left ">
                                <label for="" class="marges">Password</label>
                                <input type="text" class="form-control primary we" name="" id="password" aria-describedby="helpId" placeholder="Entrer votre mot de passe">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                    </div>
                    <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control primary " name="" id="login" aria-describedby="helpId" placeholder="Entrer votre email">
                        <small id="helpId" class="form-text text-muted"></small>
                      </div>

                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn">Se connecter</button>
                        <a href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>" iprclass="ml-5 compte">Creer compte</a>
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
