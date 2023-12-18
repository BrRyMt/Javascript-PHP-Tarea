<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <main>
        <div class="container">
            <div class="mb-3">
                <form action="">
                    <div class="mb-3">
                        <label class="form-label">publishers</label>
                        <select name="publishers" id="publishers" class="form-select">
                            <option value="">Seleccionar</option>
                        </select>
                    </div>


                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Nombre_Real</th>
                                    <th>Genero</th>
                                    <th>Raza</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>


    </main>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function $(id) {
                return document.querySelector(id)
            }


            (function() {
                fetch("../controller/Publisher.controller.php?operacion=listar")
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        console.log(datos);
                        datos.forEach(element => {
                            const tagOption = document.createElement("option");
                            tagOption.value = element.id
                            tagOption.innerHTML = element.publisher_name

                            $("#publishers").appendChild(tagOption)
                        });

                    })
                    .catch(e => {
                        console.error(e);
                    })
            })();
            const tbody = $("tbody");
            $("#publishers").addEventListener("change", (event) => {
                Seleccion = event.target.value;
                if (Seleccion != "") {
                    const parametros = new FormData();
                    parametros.append("operacion", "BuscarP");
                    parametros.append("publisher_id", Seleccion)
                    fetch("../controller/Publisher.controller.php", {
                            method: "POST",
                            body: parametros
                        })
                        .then(respuesta => respuesta.json())
                        .then(datos => {
                            datos.forEach(element => {
                                const tr = document.createElement("tr");

                                const idSuper = document.createElement("td");
                                idSuper.textContent = element.id;
                                tr.appendChild(idSuper)

                                const SuperName = document.createElement("td");
                                SuperName.textContent = element.superhero_name;
                                tr.appendChild(SuperName)

                                const Fullname = document.createElement("td");
                                Fullname.textContent = element.full_name;
                                tr.appendChild(Fullname)

                                const Genero = document.createElement("td");
                                Genero.textContent = element.gender;
                                tr.appendChild(Genero)

                                const Raza = document.createElement("td");
                                Raza.textContent = element.race;
                                tr.appendChild(Raza)

                                tbody.appendChild(tr);
                            })
                        })
                }
            })


        })
    </script>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>