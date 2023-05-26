<body>
    <h1>En el siguiente formulario ingresa los datos de tu reporte</h1>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="crearReporte" style="margin-left: 50px; text-align: center; border-radius: 100px; flex-direction: column; justify-content: center; align-items: center; width: 90%;">
            <h2>Llena correctamente cada campo</h2>
            <form style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 10px;" method="POST" action="views/alumno/generarpdf.php" onclick = "mensaje()">
                <div class="form-group">
                    <label for="nombreEstudiante">Nombre del estudiante:</label>
                    <input type="text" id="nombreEstudiante" name="nombreEstudiante">
                </div>
                <div class="form-group">
                    <label for="institucion">Institución educativa:</label>
                    <input type="text" id="institucion" name="institucion">
                </div>
                <div class="form-group">
                    <label for="periodo">Período de realización:</label>
                    <input type="text" id="periodo" name="periodo">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del proyecto o actividades realizadas:</label>
                    <input type="text" id="descripcion" name="descripcion">
                </div>
                <div class="form-group">
                    <label for="horas">Horas totales dedicadas al servicio social:</label>
                    <input type="text" id="horas" name="horas">
                </div>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de inicio del servicio social:</label>
                    <input type="date" id="fechaInicio" name="fechaInicio">
                </div>
                <div class="form-group">
                    <label for="fechaFin">Fecha de finalización del proyecto:</label>
                    <input type="date" id="fechaFin" name="fechaFin">
                </div>
                <div class="form-group">
                    <label for="objetivos">Objetivos del servicio social:</label>
                    <input type="text" id="objetivos" name="objetivos">
                </div>
                <div class="form-group">
                    <label for="resultados">Resultados y logros obtenidos:</label>
                    <input type="text" id="resultados" name="resultados">
                </div>
                <div class="form-group">
                    <label for="evaluacion">Evaluación del supervisor:</label>
                    <input type="text" id="evaluacion" name="evaluacion">
                </div>
                <!-- Resto de los campos de entrada... -->
                <div class="form-group">
                    <label for="firmaEstudiante">Firma del estudiante:</label>
                    <input type="text" id="firmaEstudiante" name="firmaEstudiante">
                </div>
                <div class="form-group">
                    <label for="firmaSupervisor">Firma del supervisor:</label>
                    <input type="text" id="firmaSupervisor" name="firmaSupervisor">
                </div>
                <div>
                    <br><br><br><br>
                    <button type="submit" id="continuar-btn" class="botoncito">Enviar reporte</button>
                </div>
            </form>
        </div>
    </div>

    <script src="views/user/js/libs/jquery.js"></script>
    <script src="views/user/js/app.js"></script>
    <script>
        function mensaje() {
            alert("Se ha enviado tu reporte para revisión");
        }
    </script>
</body>
