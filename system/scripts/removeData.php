<?php

require ("../connection/Connect.php");

if ($_GET["id"]) {
    $id = $_GET["id"];
    $conn = new Connect();

    $query = "select * from archivos where id = $id";
    $result = mysqli_query($conn->conectar(), $query);

    while ($row = mysqli_fetch_array($result)) {
        $filename = $row["archivo_nombre"];
    }

    $path = "../../images_gallery/" . $filename;

    if (unlink($path)) {
        mysqli_query($conn->conectar(), "DELETE FROM archivos WHERE id = $id");
        echo "Arreglo eliminada con éxito";
    } else {
        echo "Error al eliminar el archivo";
    }
} else {
    echo "No hay u id para buscar";
}
?>

