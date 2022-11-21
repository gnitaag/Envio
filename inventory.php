<?php
echo "success";

echo <<<INT   
            <!-- Dispositivos -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Dispositivos</h6>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="bg-light d-flex rounded align-items-center justify-content-between p-4">
                            <img src="img/dron.png" alt="" style="width:80px;"/>
                            <div class="ms-3">
                                <p class="mb-2">#1</p>
                                <h6 class="mb-0">Cargando</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="bg-light d-flex rounded align-items-center justify-content-between p-4">
                            <img src="img/robot.png" alt="" style="width:80px;"/>
                            <div class="ms-3">
                                <p class="mb-2">#2</p>
                                <h6 class="mb-0">En curso</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <img src="img/dron.png" alt="" style="width: 80px;"/>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        <a href="">Agregar dispositivo</a>
                    </div>
                </div>
            </div>
            <!-- Dispositivos End -->
INT;
?>