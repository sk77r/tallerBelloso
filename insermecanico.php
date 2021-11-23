<div class="col-md-12 border">
    <p>Asigne el mecanico</p>
    <form method="POST">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" name="placa22" id="placa2" placeholder="PLACA VEHICULO" minlength="7" maxlength="7" required>
            </div>
            <div class="col">
                <input type="text" id="idmecanicotext2" name="idmecanicotext22" class="form-control" placeholder="ID MECANICO" minlength="10" maxlength="10" required>
            </div>
            <div class="col">
                <input type="text" name="falla2" class="form-control" placeholder="FALLA" minlength="5" maxlength="100" required>
            </div>
            <button type="submit" name="botonA" class="btn btn-primary">Guardar datos</button>
        </div>
    </form>
    <BR></BR>
</div>

</div>
</div>
<style>
input {
  border: 1px solid currentcolor;
}
input:invalid {
  border: 1px dashed red;
}

}
</style>


<?php

$Diagnostico = new Database();
if (isset($_POST["botonA"])) {
    $IdVehiculo = $Diagnostico->sanitize($_POST['placa22']);
    $IdMecanico = $Diagnostico->sanitize($_POST['idmecanicotext22']);
    $Falla = $Diagnostico->sanitize($_POST['falla2']);
    $res = $Diagnostico->insertDiagnostico($IdVehiculo, $IdMecanico, $Falla);
    if ($res) {
        $message = "Datos insertados con éxito";
        $class = "alert alert-success";
    } else {
        $message = "No se pudieron insertar los datos";
        $class = "alert alert-danger";
    }

?>
    <div class="<?php echo $class ?>">
        <?php echo $message; ?>
    </div>
<?php
}

?>