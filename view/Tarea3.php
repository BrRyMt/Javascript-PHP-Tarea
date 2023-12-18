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


        <form action="">
            <div class="mb-3 container">
                <label class="form-label">Publisher Busqueda:</label>
                <select name="" id="publishers" class="form-select">
                    <option value="">Seleccionar</option>
                </select>
            </div>
            <div style="max-height: 400px; overflow-y: auto;">
                    <canvas id="Alineaciones">

                    </canvas>
            </div>

        </form>

    </main>

    <script>
        //spu_buscar_alineacion_publisher

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

        $("#publishers").addEventListener("change",(event)=>{
            cambio = event.target.value;

            if(cambio!=""){
                fetch()
                .then()
                .then()
                //PARA COMPLETAR
            }
        })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>