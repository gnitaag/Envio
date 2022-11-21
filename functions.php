<?php
$estadoarr = array(
    "1"=>"Agendada",
    "2"=>"Completada",
    "3"=>"Cancelada",
    "4"=>"En proceso"
);

function success_msg($prompt){
    echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
    <i class=\"fa fa-exclamation-circle me-2\"></i>$prompt
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
</div>";
}

function failure_msg($prompt){
    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    <i class=\"fa fa-exclamation-circle me-2\"></i>$prompt
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
</div>";
}
?>