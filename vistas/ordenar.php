<?php
require ("../system/connection/Connect.php");
include_once ("../template/top.html");

$id = $_GET["id"];
$conn = new Connect();
mysqli_query($conn->conectar(), "SET NAMES 'utf8'");
$query = "select * from archivos where id = $id";
$result = mysqli_query($conn->conectar(), $query);
?>

<div id="content_tittle">
    <img src="../resources/images/title_index.png"/>
</div>
<div id="content_info">
    
    <div style="width: 1px; height: 5px; clear: both;"></div>
</div>


<?php include_once ("../template/bottom.html"); ?>



