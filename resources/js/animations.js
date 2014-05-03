var index = 1;

function start() {
    var slider = document.getElementById("navigation");
    var images = [1, 2, 3, 4, 5, 6, 7, 8];
    var x = images.length;

    if (index >= x) {
        index = 0;
    }
    slider.style.backgroundImage = "url('/fiore2.0/resources/images/slidertemplate/" + images[index] + ".jpeg')";
    index++;
}

function show(id, arreglo){
    var imgdetalle = document.getElementById("imgdetalles");
    imgdetalle.src= "/fiore2.0/images_gallery/"+arreglo;
    $("#pop").show();
}

function hide(){
    $("#pop").hide();
}



