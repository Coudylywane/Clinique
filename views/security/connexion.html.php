<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
         <div>
            <div class="row hhhh">
              <div class="col-md-6 image">
               je suis pas normall
              </div>
              <style>
                
              </style>
              <div class="col-md-6 text-center center">
                <form action="<?=WEB_ROUTE?>" method="post">
                   <img class="logo mt-5 " src="image/logo.png" alt="">
                    <div class="mt-5 ml-5">
                      <div class="form-group ml-5 w-75 text-left">
                        <label for="">Login</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                      </div>
                      <div class="form-group ml-5  w-75 text-left">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                    <button type="submit" class="btn btn-primary">Annuler</button>
                </form>
        
              </div>
            </div>
         </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<style>
  body{
    overflow-x: hidden;
  }

  img{
    vertical-align: middle;
    border-style: none;
    width: 857px;
    height: 901px;
  }
  .logo{
    vertical-align: middle;
    border-style: none;
    width: 150px;
    height: 150px;
    
  }
  .image{
   background-image: url('image/3.png');

  }
  .hhhh{
   height: 900px;
  }
  @media screen and (max-width:767px) {
  .image{
  display: none;
   }
  }

  .center{
    margin-top: 10%;
  }
    
</style>