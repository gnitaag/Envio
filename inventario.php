<?php
 //get info
 $query = "SELECT dispID,tipodisp,porcentajebateria   FROM dispositivos ;";
 $result = $con -> query($query);
 
echo <<<INT
            <!-- Dispositivos -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Dispositivos</h6>
                    </div>
INT;                    
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
echo <<<INT
                    <div class="col-md-4 col-xl-4">
                        <div class="bg-light d-flex rounded align-items-center justify-content-between p-4 mb-4">
                            <img src="img/{$row['tipodisp']}.png" alt="" style="width:80px;height:60px;"/>
                            <div class="ms-3">
                                <h6 class="mb-0">#  {$row['dispID']}</h6>
                                <p class="mb-2">Bateria: {$row['porcentajebateria']}</p>
                                <p class="mb-2"></p>
                                <p class="mb-2"><a href="?pg=dispositivo&id={$row['dispID']}">Ver detalles</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between ">
                            <h6 class="mb-0"></h6>
                            <a href=""></a>
                        </div>
                    </div>
INT;                    

    }
}

echo <<<INT2
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        <a href="?pg=agregardisp">Agregar dispositivo</a>
                    </div>
                </div>
            </div>
            <!-- Dispositivos End -->
INT2;
?>