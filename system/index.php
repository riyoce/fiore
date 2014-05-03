<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <script type="text/javascript" src="/fiore2.0/system/resources/js/jquery-2.1.0.js"></script>
        <script type="text/javascript" src="/fiore2.0/system/resources/js/jquery.form.js"></script>
        <script type="text/javascript" src="/fiore2.0/system/resources/js/crud.js"></script>

        <link type="text/css" rel="stylesheet" href="/fiore2.0/system/resources/css/cssLayout.css"/>
        <link type="text/css" rel="stylesheet" href="/fiore2.0/system/resources/css/default.css"/>

        <title>Fiore System 2.0</title>
    </head>
    <body onload="uploadFile();loadTable();">   
        <div id="header">
            <div id="logo"></div>
            <div id="menu">                
                Fiore System            
            </div>
        </div>
        <div id="content">  
            <br/>

            <form id="myForm" action="scripts/addData.php" method="post" enctype="multipart/form-data">
                <center>
                    Nombre: <input type="text" name="nombre"/>
                    Precio: <input type="text" name="precio"/>  
                    <br/>
                    <br/>
                    Tipo:
                    <select id="tipo" name="tipo">
                        <option value="">Selecciona un tipo de arreglo</option>
                        <option value="especial">Especial</option>
                        <option value="flor">Flor</option>
                        <option value="planta">Planta</option>
                    </select>                
                    Observaciones: <input type="text" name="observaciones"/>
                    <br/>
                    <br/>
                    <input type="file" name="myfile"/>
                    <br/>
                    <br/>
                    <input type="submit" value="Cargar"/>
                    <div id="message"></div>
                </center>
            </form>            
            <br/>

            Buscar por nombre: <input type="text" id="busqueda" placeholder="Buscar..." onkeyup="serchByName();"/>
            Buscar por tipo: 
            <select id="busquedatipo" onchange="serchByType();">
                <option value="">Selecciona un tipo de arreglo</option>
                <option value="especial">Especial</option>
                <option value="flor">Flor</option>
                <option value="planta">Planta</option>
            </select>
            <br/>
            <br/>
            <div id="data">

            </div>
        </div>
    </body>
</html>
