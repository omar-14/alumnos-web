<?php
    include("./configBD.php");
    include("./fpdf/fpdf.php");
    
    $curp = $_REQUEST["curp"];

    $sqlDatos = "SELECT * FROM informacion_general WHERE `curp` = '$curp'";
    $resDatos = mysqli_query($conexion, $sqlDatos);
    $infDatos = mysqli_fetch_row($resDatos);

    $id_usuario=$infDatos[1];

    $sqlInfAlmn = "SELECT usuario FROM alumno WHERE `id_usuario` = '$id_usuario'";
    $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
    $infAlmn = mysqli_fetch_row($resInfAlmn);

    $sqlEsc = "SELECT * FROM informacion_escolar WHERE `id_usuario` = $id_usuario";
    $resEsc = mysqli_query($conexion, $sqlEsc);
    $infEsc = mysqli_fetch_row($resEsc);

    $sqlHorario = "SELECT * FROM horarios WHERE 'id_horarios'= '$infEsc[10]' ";
    $resHor = mysqli_query($conexion, $sqlHorario);
    $infHor= mysqli_fetch_row($resHor);
    
    $pdf = new FPDF();
    
    $pdf->AddPage();
    $pdf->SetTextColor(94,94,96);
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(1,1,utf8_decode('Escuela Superior de Cómputo'));
    $pdf->Cell(3,20,"Nombre: ".utf8_decode($infDatos[3]." ".$infDatos[4]." ".$infDatos[5]));
    $pdf->Cell(3,40,"Boleta: ".$infAlmn[0]);
    $pdf->Cell(3,60,"Correo: ".$infDatos[8]);
    $pdf->Cell(3,90,"Grupo de Examen: ".$infEsc[10]);
    $pdf->Cell(3,110,"Horario: ".$infEsc[11]);
    $pdf->Cell(3,130,utf8_decode('La ubicacion del laboratorio asignado se te enviara'));
    $pdf->Cell(2,150,'por correo electronico');
    $pdf->Cell(2,180,utf8_decode('Que tenga un buen día'));
    //$pdf->Output("F","pdf_Alumno.pdf");
    $pdf->Output();
?>
