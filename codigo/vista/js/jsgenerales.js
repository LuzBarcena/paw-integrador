//cuando hace click va cambiando entre ocultar el menu y mostrar el icon
//o mostrar el menu y ocultar el icon
function menu() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
