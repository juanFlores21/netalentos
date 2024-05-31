////////////////////////////////////////////////////////////////////////////////////////////
// Rellenar edad
document.addEventListener("DOMContentLoaded", function() {
    var edadSelect = document.getElementById("edad");

    // Autorellenar el combo box con valores del 18 al 30
    for (var i = 18; i <= 30; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        edadSelect.appendChild(option);
    }
});
