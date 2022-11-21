<?php

if(!isset($_GET['id'])){
    echo "Provea el id";
}else {
    //get info
    $query = "SELECT *  FROM reservas WHERE reservaID='{$_GET['id']}';";
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
                            <table class="table">
                                <tbody>
INT;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        $estado = $estadoarr[$row['estado']];
        $disp = $row['dispID'];
        $reservo = $row['registradopor'];
        $link = "https://drive.google.com/file/d/1W430xYBK5aXIyrLsP8lRFazjsqsM-OD7/view?usp=share_link";
        if (!empty($_POST)) { //SI SE ENVIO ALGO
            //Check data
            $to = "email@example.com"; // this is your Email address
            $from = $_POST['email']; // this is the sender's Email address
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $subject = "Form submission";
            $subject2 = "Copy of your form submission";
            $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
            $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
            $headers = "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$message,$headers);
            mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
            echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
            // You can also use header('Location: thank_you.php'); to redirect to another page.
                
        }
echo <<<INT
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td>{$row['reservaID']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Remitente</th>
                                        <td>{$row['remitente']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td>{$row['emailremitente']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Destinatario</th>
                                        <td>{$row['destinatario']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td>{$row['emaildestinatario']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tipo</th>
                                        <td>{$row['tiporeserva']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lugar recogida</th>
                                        <td>{$row['recogida']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lugar entrega</th>
                                        <td>{$row['entrega']}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fecha y hora</th>
                                        <td>{$row['fechahora']}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Ruta</h6>
                            </div>
                            <iframe class="position-relative rounded w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;height:300px;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Estado</th>
                                        <td>{$estado}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dispositivo encargado</th>
                                        <td>{$disp}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Reservado por</th>
                                        <td>{$reservo}</td>
                                    </tr>
INT;


echo <<<INT
                                    <tr>
                                        <th scope="row">Link video</th>
                                        <td><a href="$link" target='_new'>Link</a></td>
                                    </tr>
INT;
    }
}
echo <<<INT
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        <a href="">Editar reserva</a>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

INT;
}
?>