<?php

require ("../connection/Connect.php");
$conn = new Connect();

$query = "select * from archivos";  

if (isset($_GET["busqueda"]) && !isset($_GET["busquedatipo"])) {   
    $busqueda = $_GET["busqueda"];
    $query = "select * from archivos where nombre like '%$busqueda%'";  
} 

if (isset($_GET["busquedatipo"]) && !isset($_GET["busqueda"])) {
    $tipo = $_GET["busquedatipo"];
    $query = "select * from archivos where tipo = '$tipo'";  
}

if (isset($_GET["busquedatipo"]) && isset($_GET["busqueda"])) {
    $tipo = $_GET["busquedatipo"];
    $busqueda = $_GET["busqueda"];
    $query = "select * from archivos where tipo = '$tipo' and nombre like '%$busqueda%'";  
}


$result = mysqli_query($conn->conectar(), $query);
?>

<table id="tbl">
    <th><b>Clave</b></th>
    <th><b>Tipo</b></th>
    <th><b>Nombre</b></th>
    <th><b>Precio</b></th>
    <th><b>Eliminar</b></th>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["clave"]; ?></td>
            <td><?php echo $row["tipo"]; ?></td>
            <td><?php echo $row["nombre"]; ?></td>
            <td>$<?php echo $row["precio"]; ?></td>
            <td style="text-align: center;"><div class="delte_icon" onclick="eliminarArchivo(<?php echo $row["id"]; ?>);">X</div></td>
        </tr>

        <?php
    }
    ?>
</table>
<br/>

