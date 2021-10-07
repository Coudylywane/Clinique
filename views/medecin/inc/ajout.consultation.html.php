<div>
        <div class=" mt-3">
            <form action="" method="post">
                <input type="hidden" class="form-control" name="controlleurs" value="medecin" placeholder="">
                <input type="hidden" class="form-control" name="action" value="modifier" placeholder="">
                <div class="form-group">
                  <label for="" class="ml-5">Constante</label>
                  <input type="text" class="form-control w-75 ml-5" name="constantes" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="" class="ml-5">Description</label>
                  <input type="text" class="form-control w-75 ml-5" name="descriptions" id="" aria-describedby="helpId" placeholder="">
                </div>

                <label for="" class="ml-5">Medicament</label>
                <label for="" style="margin-left: 32%;">Posologie</label>
                <div class="input-group ml-5">
                  <select class="form-control" name="medicaments[]" id="">
                    <option value="0">Entrer un medicament</option>
                    <?php foreach ($medicaments as  $medicament):?>
                        <option value="<?=$medicament['id_medicament']?>"><?= $medicament['nom_medicament']?></option>
                    <?php endforeach?>
                    </select>                    
                    <input type="text" aria-label="Last name" class="form-control" style="margin-right: 30%;" name="posologies[]">
                    <button type="button" class="btn btn-primary text_light" onclick="addField()" style="position: relative;right: 11%;;">+</button>
                </div>
                <div id="Cible">
                </div> 
                <button type="submit" class="btnss primary text-light mt-4" style="width: 20%;margin-left:35%;">Valider</button>
            </form>
        </div>
</div>

<script>
function addField() {
document.getElementById('Cible').innerHTML +=
'<label for="" class="ml-5">Medicament</label><label for="" style="margin-left: 32%;">Posologie</label><div class="input-group ml-5"><select class="form-control" name="medicaments[]" ><option value="0">Entrer un medicament</option><?php foreach ($medicaments as  $medicament):?><option value="<?=$medicament['id_medicament']?>"><?= $medicament['nom_medicament']?></option><?php endforeach?></select><input type="text" aria-label="Last name" class="form-control"style="margin-right: 25%;" name="posologies[]"></div>'; 

}

</script>