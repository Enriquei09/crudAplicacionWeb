<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Empleado</title>
</head>
<body>
    <h1>Registrar Empleado</h1>
    <form method="post" action="">
        Curp: <input type="text" name="curp" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Apellido Paterno: <input type="text" name="ap_pat" required><br>
        Apellido Materno: <input type="text" name="ap_mat" required><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nac" required><br>
        Escolaridad: <input type="text" name="escolaridad" required><br>
        Domicilio: <input type="text" name="domicilio" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $ap_pat = $_POST['ap_pat'];
    $ap_mat = $_POST['ap_mat'];
    $fecha_nac = $_POST['fecha_nac'];
    $escolaridad = $_POST['escolaridad'];
    $domicilio = $_POST['domicilio'];

    $sql = "INSERT INTO empleado (Curp, Nombre, Ap_Pat, Ap_Mat, Fecha_Nac, Escolaridad, Domicilio)
    VALUES ('$Curp', '$nombre', '$ap_pat', '$ap_mat', '$fecha_nac', '$escolaridad', '$domicilio')";

echo "Nuevo registro creado con éxito";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


