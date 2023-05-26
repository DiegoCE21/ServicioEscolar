<!-- login/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>usuario/verify" method="post">
        <label for="correo">Correo</label><br>
        <input type="email" id="correo" name="correo" required><br>
        <label for="contrasena">Contraseña</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php if(isset($this->message)) { echo $this->message; } ?>
</body>
</html>
