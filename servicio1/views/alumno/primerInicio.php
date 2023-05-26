<!DOCTYPE html>
<html>
<head>
  <title>Datos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .form-group {
      margin-bottom: 15px;
      display: flex;
    }
    
    .form-group label {
      flex-basis: 30%;
      margin-bottom: 5px;
      margin-left: 15px;
      font-weight: bold;
    }
    
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="tel"] {
      flex-basis: 70%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    .form-group button {
      padding: 10px 20px;
      background-color: #4CAF50;
      border: none;
      color: #fff;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .form-group button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Revisa que tus datos sean correctos, si es asi, da clic en guardar, si son incorrectos, corrige y da clic en guardar</h2>
    <form action="submit.php" method="post">
      <div class="form-group">
        <label for="id_estudiante">ID Estudiante:</label>
        <input type="number" id="id_estudiante" name="id_estudiante" placeholder="3" required>

        <label for="nom_estudiante">Nombre:</label>
        <input type="text" id="nom_estudiante" name="nom_estudiante" placeholder="Esmeralda" required>
      </div>
      <div class="form-group">
        
      </div>
      <div class="form-group">
        <label for="ap_estudiante">Apellido Paterno:</label>
        <input type="text" id="ap_estudiante" name="ap_estudiante" placeholder="Sanchez" required>

        <label for="am_estudiante">Apellido Materno:</label>
        <input type="text" id="am_estudiante" name="am_estudiante" placeholder="Castillo" required>
      </div>
 
      <div class="form-group">
        <label for="semestre_estudiante">Semestre:</label>
        <input type="number" id="semestre_estudiante" name="semestre_estudiante" placeholder="6" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="8110477599" required>
      </div>

      <div class="form-group" style = "width:50%;">
        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" placeholder="ISC" required>

      </div>
      <div class="form-group">
        <button type="submit">Guardar</button>
      </div>
    </form>
  </div>
</body>
</html>
