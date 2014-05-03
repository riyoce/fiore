/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function loadTable() {
    $("#data").load("/fiore2.0/system/scripts/getData.php");
}

function serchByName() {
    var busqueda = document.getElementById("busqueda").value.trim();
    var tipo = document.getElementById("busquedatipo").value.trim();
    if (tipo !== "") {
        $("#data").load("/fiore2.0/system/scripts/getData.php?busqueda=" + busqueda + "&busquedatipo=" + tipo);
    } else {
        $("#data").load("/fiore2.0/system/scripts/getData.php?busqueda=" + busqueda);
    }
}

function serchByType() {
    var busqueda = document.getElementById("busqueda").value.trim();
    var tipo = document.getElementById("busquedatipo").value.trim();
    if (busqueda !== "") {
        $("#data").load("/fiore2.0/system/scripts/getData.php?busqueda=" + busqueda + "&busquedatipo=" + tipo);
    } else{
        $("#data").load("/fiore2.0/system/scripts/getData.php?busquedatipo=" + tipo);
    }    
}

function uploadFile() {
    var options = {
        beforeSend: function() {
            //clear everything            
            $("#message").html("");
        },
        uploadProgress: function(event, position, total, percentComplete) {

        },
        success: function() {

        },
        complete: function(response) {
            $("#message").html("<font color='green'>" + response.responseText + "</font>");  
            serchByName();
        },
        error: function() {
            $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
        }

    };

    $("#myForm").ajaxForm(options);
}

function eliminarArchivo(id) {
    var r = confirm("¿En verdad deceas eliminar este arreglo?");

    if (r === true) {
        ajax = objetoAjax();
        ajax.open("GET", "/fiore2.0/system/scripts/removeData.php?id=" + id);

        ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
                $("#data").load("/fiore2.0/system/scripts/getData.php");
            }
        };

        ajax.send(null);
    }

}