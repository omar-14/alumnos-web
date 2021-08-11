<?php
    include("../configBD.php");

    $sqlAlmns = "SELECT * FROM horarios";
    $resAlmns = mysqli_query($conexion, $sqlAlmns);
    

    $Registros = "";
    while($data = mysqli_fetch_array($resAlmns)){
        $Registros .= "

    <tr>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td>$data[3]</td>
        <td>$data[4]</td>
        <td>
        <i class='fas fa-times eliminar' data-boleta='$data[0]'></i>&nbsp;&nbsp;
        </td>
    </tr>
    ";
    }
?>