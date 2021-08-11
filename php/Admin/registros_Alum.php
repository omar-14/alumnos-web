<?php
    include("../configBD.php");

    $sqlAlmns = "SELECT * FROM alumno";
    $resAlmns = mysqli_query($conexion, $sqlAlmns);
    

    $Registros = "";
    while($data = mysqli_fetch_array($resAlmns)){
        $Registros .= "

    <tr>
        <td>$data[0]</td>
        <td>$data[1]</td>
        <td>
        <i class='fas fa-eye ver' data-boleta='$data[0]'></i>&nbsp;&nbsp;
        <i class='fas fa-edit editar' data-boleta='$data[0]'></i>&nbsp;&nbsp;
        <i class='fas fa-times eliminar' data-boleta='$data[0]'></i>&nbsp;&nbsp;
        </td>
    </tr>
    ";
    }
?>