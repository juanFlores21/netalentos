const cbxEstado = document.getElementById('estado')
cbxEstado.addEventListener("change", getMunicipios)

const cbxMunicipio = document.getElementById('ciudad')
cbxMunicipio.addEventListener("change", getLocalidades)

function fetchAndSetData(url, formData, targetElement) {
    return fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
        .then(response => response.json())
        .then(data => {
            targetElement.innerHTML = data;
        })
        .catch(err => console.log(err));
}

function getMunicipios() {
    let estado = cbxEstado.value;
    let url = 'valida/obtener_ciudades.php';
    let formData = new FormData();
    formData.append('estado', estado);

    fetchAndSetData(url, formData, cbxMunicipio)
        .then(() => {
            cbxLocalidad.innerHTML = ''
            let defaultOption = document.createElement('option');
            defaultOption.value = 0;
            defaultOption.innerHTML = "Seleccionar";
            cbxLocalidad.appendChild(defaultOption);
        })
        .catch(err => console.log(err));
}