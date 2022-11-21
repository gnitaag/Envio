<?php

if(!isset($_GET['estado'])){
    $cond = "";
} else {
    if ($_GET['estado']=="agendadas"){
          $estado = 1;
    } elseif ($_GET['estado']=="completadas"){
          $estado = 2;
    } elseif ($_GET['estado']=="canceladas"){
        $estado = 3;
    } else {
        $estado = 5;
    }
    
    $cond = "WHERE estado='$estado' ";
}
//get info
$query = "SELECT reservaID,tiporeserva,fechahora,recogida,entrega,estado  FROM reservas $cond ;";
$result = $con -> query($query);

echo <<<INT
            <!-- RESERVAS Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Solicitudes</h6>
                        <a href="">Ver todos</a>
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
                                    <th scope="col">Estado</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
INT;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        $estado = $estadoarr[$row['estado']];
echo <<<INT2
                                <tr>
                                    <td>{$row['tiporeserva']}</td>
                                    <td>{$row['fechahora']}</td>
                                    <td>Robot #1</td>
                                    <td>{$row['recogida']}</td>
                                    <td>{$row['entrega']}</td>
                                    <td>{$estado}</td>
                                    <td><a class="btn btn-sm btn-primary" href="?pg=detalle&id={$row['reservaID']}">Detalles</a></td>
                                </tr>
INT2;
        
    }
} else {
    failure_msg("No hay reservas");
}




echo <<<INT

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- RESERVAS End -->
INT;
?>