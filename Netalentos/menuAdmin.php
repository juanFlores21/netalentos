            <?php
            include("conexion_db.php");
            session_start();

            // Verificar si el usuario está autenticado
            if (!isset($_SESSION['nombre'])) {
                // Si no está autenticado, redirigir a la página de inicio de sesión
                header("Location: sesionAdmin.php");
                exit;
            }

            // Código PHP para obtener la información de disponibilidad de fechas
            // Consulta para obtener los concursos registrados
            $sql = "SELECT Nombre, FechaInicio, HoraInicio FROM Concurso";
            $result = $conn->query($sql);

            // Variable para almacenar la información a mostrar
            $informacion = "";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $informacion .= "Nombre: " . $row["Nombre"] . " - Fecha: " . $row["FechaInicio"] . " - Hora: " . $row["HoraInicio"] . "\n";
                }
            } else {
                $informacion = "No hay concursos registrados.";
            }

           // Consulta para obtener los jueces
            $sql_jueces = "SELECT idJuez, nombre FROM Juez";
            $result_jueces = $conn->query($sql_jueces);

            // Consulta para obtener las categorias
            $sql_cate = "SELECT idCategorias, nombre FROM categorias";
            $result_cate = $conn->query($sql_cate);

            ?>

            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="menuAdmin.css">
                <title>MENU ORGANIZADOR</title>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Aquí especificamos el idioma español -->
            </head>

            <body>
                <!-- Barra superior con logotipo -->
                <div class="logo-bar">
                    <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
                </div>

                <!-- Menú -->
                <nav class="nav">
                    <ul class="list">
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/calendar.svg" class="list__img">
                                <a href="#" class="nav__link" data-target="concurso">Crear concurso</a>
                            </div>
                        </li>

                        <li class="list__item">
                            <div class="list__button">
                                <img src="assets/check.svg" class="list__img">
                                <a href="#" class="nav__link" data-target="consultar">Consultar/ Monitorear</a>
                            </div>
                        </li>

                        <li class="list__item">
                            <div class="list__button">
                                <img src="assets/logout.svg" class="list__img">
                                <a href="iniciarSesion.php" class="nav__link">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Contenido principal -->
                <div class="content">
                    <!---------------------------------------------------------------------------------->
                    <!-- CREAR CONCURSO -->
    <form action="validaConcurso.php" method="post">
                      <div class="concurso">
                        <h2>Crear concurso</h2><br>
                        <div class="crear_conc">
                        <!-- Nombre del concurso -->
                        <label for="nombre_concurso">Nombre del concurso:</label><br>
                        <input type="text" id="nombre_concurso" name="nombre_concurso" required>
                        <br>
                    </div>

                        <!-- Categoria -->
                        <br>
                        <div class="dob-label">
                            <p>Categoria</p>
                        </div>
                        <div class="dob-inputbox">
                            <select name="categoria" required>
                                <option value="" disabled selected>Selecciona la categoria</option>
                                <?php
                                if ($result_cate->num_rows > 0) {
                                    while ($row = $result_cate->fetch_assoc()) {
                                        echo "<option value='" . $row["idCategorias"] . "'>" . $row["nombre"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                            <div class="hora_fecha">
                                <!-- Campo de entrada de hora en formato de 24 horas -->
                                <div class="dob-label">
                                    <p>Hora del evento</p>
                                </div>
                                <div class="dob-inputbox">
                                    <input type="time" id="hora_evento" name="hora_evento" required>
                                </div>
                                <br>

                                <!-- Campo de entrada de fecha -->
                                <div class="dob-label">
                                    <p>Fecha del evento</p>
                                </div>
                                <div class="dob-inputbox">
                                    <input type="date" name="fecha_evento" placeholder="Selecciona una fecha" required>
                                </div>
                                <br>
                            </div>
                            <!-- Nombre del Juez -->
                            <div class="dob-label">
                                <p>Nombre del Juez</p>
                            </div>
                            <div class="dob-inputbox">
                                <select name="id_juez" required>
                                    <option value="" disabled selected>Selecciona el Juez</option>
                                    <?php
                                    if ($result_jueces->num_rows > 0) {
                                        while ($row = $result_jueces->fetch_assoc()) {
                                            echo "<option value='" . $row["idJuez"] . "'>" . $row["nombre"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                        <div class="info">
                <!-- Disponibilidad de Fecha -->
                <div class="dob-label">
                    <p>Disponibilidad de Fecha</p>
                </div>
                <div class="dob-inputbox">
                    <textarea id="informacion_evento" name="informacion_evento" rows="14" placeholder="Concursos registrados"><?php echo htmlspecialchars($informacion); ?></textarea>
                </div>

                <!-- CREAR CONCURSO -->
                <button class="boton-crear-conc" id="boton_enviar" type="submit">Crear concurso</button>
            </div>
        </div>
    </form>
                    <!------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    <!-- CONSULTAR/ MONITOREAR -->
                    <div class="consultar">
                        <h2>Consultar/ Monitorear</h2>
                        <br>
                        <div class="search-container">
                            <input type="number " id="search-input" placeholder="Ingresa ID..." required>
                            <button type="button" id="search-button">Buscar</button>
                        </div>
                        <br>
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>ID participante</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Edad</th>
                                    <th>Correo</th>
                                    <th>Concurso</th>
                                    <th>Categoria</th>

                                </tr>
                            </thead>
                            <tbody id="user-table-body">
                                <!-- Aquí se llenarán los datos dinámicamente -->
                            </tbody>
                        </table>
                    </div>

                   


                    <!------------------------------------------------------------------------------->
                </div>

                <!-- Script -->
                <script src="js/menuAdmin.js"></script>
                <script>
    document.getElementById('search-button').addEventListener('click', function() {
        const searchInput = document.getElementById('search-input').value;
        fetch(`search_user.php?id=${searchInput}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('user-table-body');
                tableBody.innerHTML = ''; // Limpiar la tabla antes de llenarla con nuevos datos

                if (data.length > 0) {
                    data.forEach(user => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${user.idParticipante}</td>
                            <td>${user.Nombre}</td>
                            <td>${user.Paterno}</td>
                            <td>${user.Edad}</td>
                            <td>${user.Email}</td>
                            <td>${user.nombreConcurso}</td>
                            <td>${user.nombreCategoria}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td colspan="7">No se encontraron resultados</td>`;
                    tableBody.appendChild(row);
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
                
            </body>

            </html>