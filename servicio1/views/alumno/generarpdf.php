<?php
require_once('tcpdf/tcpdf.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombreEstudiante = $_POST['nombreEstudiante'];
    $institucion = $_POST['institucion'];
    $periodo = $_POST['periodo'];
    $descripcion = $_POST['descripcion'];
    $horas = $_POST['horas'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $objetivos = $_POST['objetivos'];
    $resultados = $_POST['resultados'];
    $evaluacion = $_POST['evaluacion'];
    $firmaEstudiante = $_POST['firmaEstudiante'];
    $firmaSupervisor = $_POST['firmaSupervisor'];

    // Crear un nuevo objeto TCPDF
    $pdf = new TCPDF();

    // Establecer información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Reporte de Servicio Social');
    $pdf->SetSubject('Reporte de Servicio Social');
    $pdf->SetKeywords('servicio social, reporte, pdf');

    // Agregar una página
    $pdf->AddPage();

    // Agregar el contenido del PDF
    $html = '
        <h1>Reporte de Servicio Social</h1>
        <p><strong>Nombre del estudiante:</strong> ' . $nombreEstudiante . '</p>
        <p><strong>Institución educativa:</strong> ' . $institucion . '</p>
        <p><strong>Período de realización:</strong> ' . $periodo . '</p>
        <p><strong>Descripción del proyecto o actividades realizadas:</strong> ' . $descripcion . '</p>
        <p><strong>Horas totales dedicadas al servicio social:</strong> ' . $horas . '</p>
        <p><strong>Fecha de inicio del servicio social:</strong> ' . $fechaInicio . '</p>
        <p><strong>Fecha de finalización del proyecto:</strong> ' . $fechaFin . '</p>
        <p><strong>Objetivos del servicio social:</strong> ' . $objetivos . '</p>
        <p><strong>Resultados y logros obtenidos:</strong> ' . $resultados . '</p>
        <p><strong>Evaluación del supervisor:</strong> ' . $evaluacion . '</p>
        <p><strong>Firma del estudiante:</strong> ' . $firmaEstudiante . '</p>
        <p><strong>Firma del supervisor:</strong> ' . $firmaSupervisor . '</p>
        <!-- Agregar el resto de los campos -->

        <p>¡Gracias por completar el reporte de servicio social!</p>
    ';

    // Escribir el contenido en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Generar el archivo PDF
    $pdf->Output('reporte.pdf', 'D');
?>
