function $(id) {
    return document.querySelector(id)
}

valor = 0;

function crearSelect(tbody) {
    valor++;
    const tr = document.createElement("tr");
    const select = document.createElement("select");
    select.id = "SelectPublisher" + valor;
    select.innerHTML = "<option value=''>Seleccionar</option>";
    tr.appendChild(select);

    tbody.appendChild(tr);

    const filas = tbody.querySelectorAll("tr");
}

function crearOptions() {
    fetch("../controller/Publisher.controller.php?operacion=listar")
        .then(respuesta => respuesta.json())
        .then(datos => {
            console.log(datos);
            datos.forEach(element => {
                const tagOption = document.createElement("option");
                tagOption.value = element.id
                tagOption.innerHTML = element.publisher_name

                $("#SelectPublisher" + valor).appendChild(tagOption)
            });

        })
        .catch(e => {
            console.error(e);
        })
};

function eliminarSelect(tbody) {
    const filas = tbody.querySelectorAll("tr");

    if (filas.length > 0) {
        valor--;
        const ultimaFila = filas[filas.length - 1];
        tbody.removeChild(ultimaFila);
    }
}

/*
function valorChange(valorchange){
    return $(valorSelect).addEventListener("change", (event) => {})
}
*/

// Preparando funciones para el evento change con cada uno de los valores y,
// con su id, activar el procedimiento para el total del gráfico de pie.

