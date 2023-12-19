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
    <header>

    </header>

    <main class="container">
        <div class="container row">
            <div class="mb-3 container col-6">
                <button type="button" class="btn btn-primary" id="Agregar"> + </button>
                <button type="button" class="btn btn-danger" id="Eliminar"> - </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <label class="form-label">Publisher Busqueda:</label>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>

            </div>

            <div style="max-height: 400px; min-height: 400px; overflow-y: auto;" class="col-6">
                <canvas id="GraficoPay"></canvas>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/function-js-add-del.js"></script>
    <script>
        function $(id) {
            return document.querySelector(id);
        }

        const tbody = $("#tbody");

        $("#Agregar").addEventListener("click", () => {
            crearSelect(tbody);
            crearOptions();
        });

        $("#Eliminar").addEventListener("click", () => {
            eliminarSelect(tbody);
        });

        const contexto = $("#GraficoPay");
        const grafico = new Chart(contexto, {
            type: 'pie',
            data: {
                labels: ["a", "b"],
                datasets: [{
                    label: 'Super Heroes',
                    data: [50, 780],
                    borderWidth: 5
                }]
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>