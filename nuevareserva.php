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
        //DATE
        $datetime = explode(" ",$_POST['datetime']);
        $datet = explode("/",$datetime[0]);
        $date = $datet[2]."-".$datet[0]."-".$datet[1]; 
        $timet = explode(":",$datetime[1]);
        $time = str_pad($timet[0], 2, "0", STR_PAD_LEFT).":".str_pad($timet[1], 2, "0", STR_PAD_LEFT).":00";

        
        $query = "INSERT INTO reservas (registradopor, remitente, emailremitente, destinatario, emaildestinatario, tiporeserva, fechahora, recogida, entrega)
        VALUES ('{$_SESSION['id']}','{$_POST['inputRemitente']}','{$_POST['inputEmailR']}','{$_POST['inputDestinatario']}','{$_POST['inputEmailD']}','{$_POST['gridRadios']}','$date $time','{$_POST['recoger']}','{$_POST['entregar']}' );";
        
        $result = $con -> query($query);
        if($result){
            success_msg("Reserva agendada. Revisa tu correo por el codigo QR para validar tu identidad al recibir tu paquete.");
            $to = "yoruageha@gmail.com";
            $subject = "Test mail";
            $message = "Hola, este es el codigo QR para confirmar tu identidad al recibir tu paquete. <br/><img src=\"https://imgs.search.brave.com/Hw1BCnBpyZVrpPfnzigNCMA0LKtd0gKzP0AWyUHGCSk/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly93d3cu/aW1lZGljYWxhcHBz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAxMS8xMS9xci1j/b2RlLmpwZw\"/>";
            $from = "envio@example.com";
            $headers = "From:" . "$from\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";
            //mail($to,$subject,$message,$headers);
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
                            <h6 class="mb-4">Nueva Reserva</h6>
                            <form action="?pg=nuevareserva" method="post">
                                <div class="row mb-3">
                                    <label for="inputRemitente" class="col-sm-4 col-form-label">Nombre remitente</label>
                                    <div class="col-sm-8">
                                        <input type="input" class="form-control" name="inputRemitente">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmailR" class="col-sm-4 col-form-label">Email remitente</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="inputEmailR"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDestinatario" class="col-sm-4 col-form-label">Nombre destinatario</label>
                                    <div class="col-sm-8">
                                        <input type="input" class="form-control" name="inputDestinatario"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmailD" class="col-sm-4 col-form-label">Email destinatario</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="inputEmailD">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Tipo de reserva:</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios1" value="Mensajeria" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Mensajeria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios2" value="Grabacion">
                                            <label class="form-check-label" for="Grabacion">
                                                Grabacion
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Lugar recogida</legend>
                                    <div class="col-sm-8">
                                        <select class="form-select mb-3" aria-label="Seleccionar" name="recoger">
                                            <option selected>Seleccionar</option>
                                            <option value="Saman">Saman</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Palmas">Palmas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Lugar entrega</legend>
                                    <div class="col-sm-8">
                                        <select class="form-select mb-3" aria-label="Seleccionar" name="entregar">
                                            <option selected>Seleccionar</option>
                                            <option value="Saman">Saman</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Palmas">Palmas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Fecha y hora</legend>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datetimepicker-input" name="datetime" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#datetimepicker5').datetimepicker({
                                                icons: {
                                                    time: "fa fa-clock-o",
                                                    date: "fa fa-calendar",
                                                    up: "fa fa-arrow-up",
                                                    down: "fa fa-arrow-down"
                                                },
                                                format: 'YYYY-MM-DD HH:MM:SS'
                                            });
                                        });
                                    </script>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary m-2 w-100">Crear reserva</button>
                                </div>
                            </form>
                        </div>
                    </div>
INT;                    
?>                    