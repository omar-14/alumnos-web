<?php
  include("./configBD.php");
  include("./fpdf/fpdf.php");
  
  $id_usuario = $_REQUEST["id_usuario"];

  $sqlInfAlmn = "SELECT usuario FROM alumno WHERE `id_usuario` = '$id_usuario'";
  $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
  $infAlmn = mysqli_fetch_row($resInfAlmn);

  $sqlDatos = "SELECT * FROM informacion_general WHERE `id_usuario` = $id_usuario";
  $resDatos = mysqli_query($conexion, $sqlDatos);
  $infDatos = mysqli_fetch_row($resDatos);

  $sqlEsc = "SELECT * FROM informacion_escolar WHERE `id_usuario` = $id_usuario";
  $resEsc = mysqli_query($conexion, $sqlEsc);
  $infEsc = mysqli_fetch_row($resEsc);
  
    $pdf = new FPDF();
    
    $pdf->AddPage();
    $pdf->SetTextColor(94,94,96);
    $title = '20000 Leguas de Viaje Submarino';
    $pdf->SetTitle($title);
    $pdf->SetAuthor('Julio Verne');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(5,10,"Nombre: ".utf8_decode($infDatos[3]." ".$infDatos[4]." ".$infDatos[5]));
    $pdf->Cell(5,40,"Boleta: ".$infAlmn[0]);
    $pdf->Cell(5,60,"Correo: ".$infDatos[8]);
    $pdf->Cell(5,90,"Grupo de Examen: ".$infEsc[10]);
    $pdf->Cell(5,110,"Horario: ".$infEsc[11]);
    $pdf->Cell(5,130,"Laboratorio: ".$infEsc[11]);
    //$pdf->Output("F","pdf_Alumno.pdf");
    $pdf->Output();
?>