function $(id) {
    return document.querySelector(id)
}

//Creando valores para el uso en las siguientes funciones 
valor = 0; // valor tipo entero para el calculo de de creacion de "select"
const seleccionId = []; //Array para la creacion del grafico

//Creando una funcion para la cual se necesitara 
//una sobrecarga que es donde se va a crear (en este  caso el cuerpo de una tabla)
function crearSelect(tbody) {
    valor++; //Aumento de valor
    const tr = document.createElement("tr"); //Creacion de una constante para el tr de la tabla
    const select = document.createElement("select");
    valorId = "SelectPublisher" + valor; // Reasignando el valor de ID + selectpublisher como concatenacion para poder guardarlo en un valor interno
    select.id = valorId; //Asignando el id de la creacion con el id concatenado
    select.innerHTML = "<option value=''>Seleccionar</option>"; // Creacion de select con los valores
    tr.appendChild(select);

    tbody.appendChild(tr);
    seleccionId.push(valorId);
    const filas = tbody.querySelectorAll("tr");
    return valorId; //Retornar el valor de ValorId que sera utilizado en una funcion siguiente
}

function crearOptions() //Esta es la funcion para crear las opciones, siguiendo una misma logica de conectarlo con un GET al controlador
{ 
    fetch("../controller/Publisher.controller.php?operacion=listar")
        .then(respuesta => respuesta.json())
        .then(datos => {
            datos.forEach(element => {
                const tagOption = document.createElement("option");
                tagOption.value = element.id
                tagOption.innerHTML = element.publisher_name

                $("#SelectPublisher" + valor).appendChild(tagOption) //Aqui se concatena para que cada vez que se crea un select nuevo se le asignen valores con su id que va en crecimiento
            });

        })
        .catch(e => {
            console.error(e);
        })
};

function eliminarSelect(tbody) { //Funcion para la eliminacion de la anterior select que se creo
    const filas = tbody.querySelectorAll("tr"); //Define las filas que tenga el tr

    if (filas.length > 0) { //Atravez .length se obtienen el valor en entero y compara con cero para evitar un error en caso de querer eliminar pero no haya select
        valor--;//Resta el valor general en 1
        const ultimaFila = filas[filas.length - 1]; //re define una nueva constante con el valor de filas pero con uno menos en longitud
        tbody.removeChild(ultimaFila); //Remueve esta ultima fila
        seleccionId.pop(); //Elimina del array el ultimo agregado
        actualizarGrafico(grafico);//Actualiza el grafico nuevamente
    }
}

function valorChange(valorchangeid) { //Funcion donde la cual se pide una sobrecarga del ID y el grafico
    $("#" + valorchangeid).addEventListener("change", (event) => { //Para cada valor nuevo se le hace un evento change
        actualizarGrafico(grafico);//Actualiza el grafico con la funcion
    })
}


//Funcion para agregar y actualizar el grafico con los nuevos valores que se encuentren

function actualizarGrafico(grafico) {
    grafico.data.labels = []; //Array
    grafico.data.datasets[0].data = []; //Array

    seleccionId.forEach((seleccionId) => {
        const seleccion = $("#" + seleccionId).value; //Obtiene el valor del ID
        if (seleccion !== '') {
            const parametros = new FormData();
            parametros.append("operacion", "listadoherores");
            parametros.append("publisher_id", seleccion);

            fetch("../controller/Publisher.controller.php", {
                method: "POST",
                body: parametros
            })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    // Agregar las nuevas etiquetas al array existente de etiquetas del gráfico
                    //////
                    grafico.data.labels = grafico.data.labels.concat(datos.map(registro => registro.Casa)); //Concatena con los nuevos valores
                    grafico.data.datasets[0].data = grafico.data.datasets[0].data.concat(datos.map(registro => registro.heroes));
                    //////
                    grafico.update(); //Actualiza el grafico finalmente
                })
                .catch(e => {
                    console.error(e);
                });
        }
    });
}
