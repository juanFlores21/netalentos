// Rellenar opciones para DÍA
var daySelect = document.getElementById("day");
for (var i = 1; i <= 31; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    daySelect.add(option);
}

// Rellenar opciones para MES
var monthSelect = document.getElementById("month");
var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
for (var i = 0; i < months.length; i++) {
    var option = document.createElement("option");
    option.value = i + 1; // Los meses comienzan desde 1
    option.text = months[i];
    monthSelect.add(option);
}

// Rellenar opciones para AÑO
var yearSelect = document.getElementById("year");
for (var i = 1980; i <= 2015; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    yearSelect.add(option);
}