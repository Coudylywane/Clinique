<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<?php require_once(ROUTE_DIR.'views/inc/menu0.html.php')?>
<div class="row">
    <div class="col-md-4">
        <?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>
    </div>
 <div class="container mt-5 ml-5">
<div class="row">

    <div class="col-md-offset-3">
     <form class="form-inline" method="POST">
     <input type="hidden" class="form-control" name="controlleurs" id="inputName" value="patient" placeholder="">
       <input type="hidden" class="form-control" name="action" id="inputName" value="filtre.prestation" placeholder="">
       <div class="row ">
       <div class="form-group ml-4">
              <label for="">Etat</label>
              <select class="form-control ml-4" name="etat" id="">
                <option value="valider">Deja fait</option>
                <option value="annuler">Pas fait</option>
              </select>
              <button type="submit" class="btn btn-primary ml-4 ">ok</button>

         </div>
         </div>
     </form>
    </div>
</div>
<div class="row mt-4 ">
<table class="table tab">
  <thead>
   
    <tr>
      <th scope="col">Nom prestation</th>
      <th scope="col">Etat Prestation</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($prestations as $key => $prestation):?>
  <tr>
    <td><?= $prestation['nom_prestation']?></td>
     <td><?=$prestation['etat_prestation']?></td>
  </tr>
  <?php endforeach?>
  </tbody>
</table>
</div>
</div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


  <style>

.ml-4, .mx-4 {
    margin-left: 2.5rem !important;

}


.tab{
    border: 1px solid #00BFFF;
}




.table td, .table th{
    padding: .75rem;
    vertical-align: top;
    border: 1px solid #00BFFF ;
 }

 .table tr {
    padding: .75rem;
    vertical-align: top;
    border: 1px solid #00BFFF ;
 }
  </style>