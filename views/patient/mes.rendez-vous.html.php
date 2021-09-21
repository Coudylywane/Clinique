<?php require_once(ROUTE_DIR.'views/inc/header.html.php')?>
<?php require_once(ROUTE_DIR.'views/inc/menu0.html.php')?>
<a href="<?= WEB_ROUTE.'?controlleurs=patient&view=prendre_rendez_vous'?>" class=" primary prendre" > <i class="bi bi-plus-square-fill"></i> Prendre Rendez-vous</a>
<!-- <button type="submit" class=" primary prendre" name="btn_submit"><i class="bi bi-plus-square-fill"></i> Prendre Rendez-vous</button>
 --><div class="row">
    <div class="col-md-4">
        <?php require_once(ROUTE_DIR.'views/inc/menu.html.php')?>
    </div>
 <div class="container mt-5 ml-5">
<div class="row">

    <div class="col-md-offset-3">
     <form class="form-inline" action="<?=WEB_ROUTE?>" method="POST">
     <input type="hidden" class="form-control" name="controlleurs" value="patient" placeholder="">
       <input type="hidden" class="form-control" name="action"  value="filtre.rendezvous" placeholder="">
       <div class="row ">
         <div class="form-group ml-4">
             <label for="">Date</label>
             <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
             
         </div>
         <div class="form-group ml-4">
              <label for="">Etat</label>
              <select class="form-control ml-4" name="etat" id="">
                <option value="valider">Valider</option>
                <option value="annuler">Annuler</option>
                <option value="en cour">En cour</option>
              </select>
         </div>
         <div class="form-group ml-4">
              <label for="">Type Rendez-vous</label>
              <select class="form-control ml-4" name="type" id="">
                <option value="consultation">Consultation</option>
                <option value="prestation">Prestation</option>
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
      <th scope="col">Type Rendez-vous</th>
      <th scope="col">Date Rendez-vous</th>
      <th scope="col">Etat Rendez-vous</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($rendezs as $key => $rendez):?>
  <tr>
    <td><?= $rendez['type_rendezvous']?></td>
    <td><?=date_format(date_create($rendez['date_rendezvous']),'d-m-Y')?></td>
     <td><?=$rendez['etat_rendezvous']?></td>
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