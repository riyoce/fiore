<?php

require ("../connection/Connect.php");

ini_set('error_reporting', -1);
ini_set('display_errors', 1);
ini_set('html_errors', 1);

$output_dir = "../../images_gallery/";

if (isset($_FILES["myfile"])) {
    if ($_FILES["myfile"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {

        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $_FILES["myfile"]["name"])) {

            $conn = new Connect();
            $mysqli = $conn->conectar();

            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $tipo = $_POST["tipo"];
            $observaciones = $_POST["observaciones"];
            $filename = $_FILES["myfile"]["name"];

            $id = lastId() + 1;

            $clave = $tipo . " - " . strval($id);

            $query = "INSERT INTO archivos (nombre, precio, tipo, observaciones, archivo_nombre, clave) VALUES ('$nombre', '$precio', '$tipo', '$observaciones', '$filename', '$clave')";

            if (mysqli_query($conn->conectar(), $query)) {
                echo "Arreglo agregado con éxito";
            } else {
                echo "algo esta pasando Dx";
            }

            mysqli_close($conn->conectar());
        }
    }
}

function lastId() {
    $conn = new Connect();
    $rs = mysqli_query($conn->conectar(), "SELECT MAX(id) AS id FROM archivos");
    while ($row = mysqli_fetch_row($rs)) {
        $id = trim($row[0]);
    }
    return $id;
}

?>