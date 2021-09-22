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
       <input type="hidden" class="form-control" name="action" id="inputName" value="filtre.consultation" placeholder="">
       <div class="row">
         <div class="form-group ml-4">
             <label for="">Date</label>
             <input type="date" name="date" id="" class="form-control ml-4" placeholder="" aria-describedby="helpId">
         </div>
         <div class="form-group ml-4">
              <label for="">Etat</label>
              <select class="form-control ml-4" name="etat" id="">
                <option value="deja fait">Deja fait</option>
                <option value="pas fait">Pas fait</option>
              </select>
              <button type="submit" class="btn btn-primary ml-4 submit ">ok</button>

         </div>
        </div>
     </form>
    </div>
</div>
<div class="row mt-4 ">
<table class="table tab">
  <thead>
   
    <tr>
      <th scope="col">Constantes</th>
      <th scope="col">Date Consultation</th>
      <th scope="col">Etat Consultation</th>
      <th scope="col">Medecin</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($consultations as $key => $consultation):?>
  <tr>
    <td><?= $consultation['constantes_consultation']?></td>
    <td><?=date_format(date_create($consultation['date_consultation']),'d-m-Y')?></td>
     <td><?=$consultation['etat_consultation']?></td>
     <td><?=$consultation['nom & prenom']?></td>
  </tr>
  <?php endforeach?>
  </tbody>
</table>
</div>
</div>
</div>
  
      
    
  
  
  <?php require_once(ROUTE_DIR.'views/inc/footer.html.php')?>  


  <style>



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


 .submit{
   width: 45px;
 }
  </style>