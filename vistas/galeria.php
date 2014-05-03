<?php
require ("../system/connection/Connect.php");
include_once ("../template/top.html");

$tipo = $_GET["tipo"];
$conn = new Connect();
mysqli_query($conn->conectar(), "SET NAMES 'utf8'");
$query = "select * from archivos where tipo = '$tipo' order by id desc";
$result = mysqli_query($conn->conectar(), $query);
?>

<div id="pop">
    <div id="divcon">
        <div id="circulo" onclick="hide();">
            X
        </div>
        <img id="imgdetalles"/>
    </div>
</div>

<div id="content_tittle">
    <img src="../resources/images/title_<?php echo $tipo; ?>.png"/>
</div>
<div id="content_info">
    <center>
        <div id="gallery">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="thumbs">
                    <img onclick="show(<?php echo $row["id"]; ?>, '<?php echo $row["archivo_nombre"]; ?>');" src="../images_gallery/<?php echo $row["archivo_nombre"]; ?>"/>
                </div>
                <?php
            }
            ?>
        </div>
    </center>
    <div style="width: 1px; height: 5px; clear: both;"></div>
</div>


<?php include_once ("../template/bottom.html"); ?>



