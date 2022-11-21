<?php
 //get info
$query = "SELECT dispID,tipodisp,porcentajebateria   FROM dispositivos LIMIT 4;";
$disps = $con -> query($query);

$query = "SELECT reservaID,tiporeserva,remitente,fechahora,recogida,entrega  FROM reservas WHERE estado='1' ;";
$solics = $con -> query($query);

echo <<<INT
            <!-- Map End -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center">
                    <iframe width="700" height="400" class="position-relative rounded "
                            src="https://maps.google.com/maps?q=javeriana%20cali&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0">
                    </iframe>
                </div>
            </div>
            <!-- Map End -->

            <!-- Dispositivos summary -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Dispositivos</h6>
                        <a href="?pg=inventario">Ver todos</a>
                    </div>
INT;                    
if ($disps->num_rows > 0) {
    while($rowd = $disps->fetch_assoc())
    {
echo <<<INT
                    <div class="col">
                        <div class="bg-light d-flex rounded align-items-center justify-content-between p-3">
                            <img src="img/{$rowd['tipodisp']}.png" alt="" style="width:60px;"/>
                            <div >
                                <p class="mb-2">#{$rowd['dispID']}</p>
                                <h6 class="mb-0">Cargando</h6>
                            </div>
                        </div>
                    </div>
INT;
    }
}
echo <<<INT
    
                </div>
            </div>
            <!-- Dispositivos summary End -->

            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <a class="weatherwidget-io" href="https://forecast7.com/es/3d45n76d53/cali/" data-label_1="CALI" data-label_2="CLIMA" data-theme="pure" >CALI CLIMA</a>
                    <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                </div>
            </div>

            <!-- Solicitudes Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Solicitudes en proceso</h6>
                        <a href="?pg=reservas">Ver todos</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha y hora</th>
                                    <th scope="col">Dispositivo</th>
                                    <th scope="col">Lugar recogida</th>
                                    <th scope="col">Lugar entrega</th>
                                    <th scope="col">Destinatario</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
INT;                    
if ($solics->num_rows > 0) {
    while($rows = $solics->fetch_assoc())
    {
echo <<<INT
                                <tr>
                                    <td>{$rows['tiporeserva']}</td>
                                    <td>{$rows['fechahora']}</td>
                                    <td>Robot #1</td>
                                    <td>{$rows['recogida']}</td>
                                    <td>{$rows['entrega']}</td>
                                    <td>{$rows['remitente']}</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detalles</a></td>
                                </tr>
INT;
    }
} else {
    failure_msg("No hay reservas en proceso");
}
echo <<<INT

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Solicitudes End -->
INT;
?>            