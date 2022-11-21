<?php
if(!isset($_GET['id'])){
    echo "Provea el id";
}else {
//get info
$query = "SELECT *  FROM dispositivos WHERE dispID='{$_GET['id']}';";
$result = $con -> query($query);

 echo <<<INT
 <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Caracteristicas</h6>
                            </div>
INT;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
echo <<<INT
                            <img src="img/{$row['tipodisp']}.png" alt=""/>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td>{$row['dispID']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marca</th>
                                        <td>{$row['marca']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Modelo</th>
                                        <td>{$row['modelo']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"># de serie</th>
                                        <td>{$row['serialnum']}</td>
                                    </tr>
INT;
    }
}
echo <<<INT

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Ubicacion</h6>
                            </div>
                            <iframe class="position-relative rounded w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;height:300px;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Estado</th>
                                        <td>En curso</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">% de bateria</th>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coordenadas</th>
                                        <td>lat long</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        <a href="">Editar dispositivo</a>
                        <a href="">Eliminar dispositivo</a>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->
INT;
}
?>