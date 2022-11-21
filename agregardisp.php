<?php
/****************** POST */
if (!empty($_POST)) {
    //Check data
    $send = True;
    foreach($_POST as $key => $value) {
        if ($value == ''){
            $send = False;
        } 
    }    
    //Enviar 
    if ($send) {
        $query = "INSERT INTO dispositivos (marca, modelo, serialnum, tipodisp)
        VALUES ('{$_POST['marca']}','{$_POST['model']}','{$_POST['serial']}','{$_POST['gridRadios']}' );";
        
        $result = $con -> query($query);
        if($result){
            success_msg("Dispositivo agregado.");
        } else {
            failure_msg("Hubo un error, vuelve a enviar la info");
        }
        
    } else {        
        failure_msg("Falta alguna informacion.");
    }
}

/******************* HTML */
echo <<<INT
<!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Agregar dispositivo</h6>
                            <form action="?pg=agregardisp" method="post">
                            <div class="row mb-3">
                                <label for="inputRemitente" class="col-sm-4 col-form-label">Marca</label>
                                <div class="col-sm-8">
                                    <input type="input" class="form-control" id="inputEmail3" name="marca">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputRemitente" class="col-sm-4 col-form-label">Modelo</label>
                                <div class="col-sm-8">
                                    <input type="input" class="form-control" id="inputEmail3" name="model">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputRemitente" class="col-sm-4 col-form-label"># serie</label>
                                <div class="col-sm-8">
                                    <input type="input" class="form-control" id="inputEmail3" name="serial">
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Tipo de dispositivo:</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios1" value="Robot" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Robot
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios2" value="Dron">
                                            <label class="form-check-label" for="Grabacion">
                                                Dron
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary m-2 w-100">Agregar dispositivo</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
INT;
?>