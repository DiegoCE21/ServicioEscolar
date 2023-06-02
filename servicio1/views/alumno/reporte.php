<!DOCTYPE html>
<html>
<head>
    <title>Título de tu página</title>
    <style>
    .error-message {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        height: 100px;
        text-align: center;
        margin-top: 20px;
    }

    #error-message-text {
        margin-left: 1220px;
        max-width: 80% !important;
    }
    </style>
</head>
<body>
    <h1>En el siguiente formulario ingresa los datos de tu reporte</h1>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="crearReporte" style="margin-left: 50px; text-align: center; border-radius: 100px; flex-direction: column; justify-content: center; align-items: center; width: 90%;">
            <h2>Llena correctamente cada campo</h2><br>
            <form style="display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 10px;" method="POST" action="views/alumno/generarpdf.php">
                <?php 
                if (!isset($this->datos) || empty($this->datos->getNombreEmpresa())): 
                ?>
                    <center><p class="error-message" style = "margin-left:420px">No puedes elaborar este reporte porque no te encuentras registrado en ningun programa</p><br><br><br></center>
                <?php 
                    die();
                endif; 
                ?>    
                <div class="form-group">
                    <label for="nombreEstudiante">Nombre del estudiante:</label>
                    <input type="text" id="nombreEstudiante" name="nombreEstudiante" value="<?php echo $this->datos->getNombre(); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="institucion">Institución educativa:</label>
                    <input type="text" id="institucion" name="institucion" value="<?php echo $this->datos->getNombreEscuela(); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="empresa">Haciendo servicio en:</label>
                    <input type="text" id="empresa" name="empresa" value="<?php echo $this->datos->getNombreEmpresa(); ?>" readonly>
                </div>
                <!-- Resto de los campos de entrada... -->
                <div class="form-group">
                    <label for="descripcion">Actividades realizadas:</label>
                    <textarea id="descripcion" name="descripcion" style="border: 1px solid black"></textarea>
                </div>
                <div class="form-group">
                    <label for="horas">Horas actuales dedicadas al servicio social:</label>
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
                    <label for="evaluacion">Aprobado por el supervisor:</label>
                    <input type="checkbox" id="evaluacion" name="evaluacion">
                </div>
                <!-- Resto de los campos de entrada... -->
                <div class="form-group">
                    <label for="firmaEstudiante">Aprobado por la dependencia:</label>
                    <input type="checkbox" id="firmaEstudiante" name="firmaEstudiante">
                </div>
                <div class="form-group">
                    <label for="firmaSupervisor">Aprobado por el asesor:</label>
                    <input type="checkbox" id="firmaSupervisor" name="firmaSupervisor">
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
</html>
