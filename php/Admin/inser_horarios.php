<?php
        include("../configBD.php");

        $id_horarios = ($_POST["id_horarios"]);
        $grupoH = ($_POST["grupoH"]);
        $lab = ($_POST["lab"]);
        $cupo = ($_POST["cupo"]);
        $horario = ($_POST["horario"]);

        $sql ="INSERT INTO `sem-20211`.`horarios` 
            (`id_horarios`, 
            `grupo`, 
            `laboratorio`, 
            `cupo`, 
            `horario`
            )
            VALUES
            ('$id_horarios', 
            '$grupoH', 
            '$lab', 
            '$cupo', 
            '$horario'
            );
        
        ";
        $respAX = [];
        $resInsAdmin = mysqli_query($conexion,$sql);

        if(mysqli_affected_rows($conexion) == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "Horarios actualizados";
        } else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Ha ocurriodo un error. Favor intentalo de nuevo";
        }

        echo json_encode($respAX);
?>
