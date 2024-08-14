<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado</title>
</head>
<body>
    <h1>Buscar Empleado</h1>
    <form method="post" action="">
        Curp: <input type="text" name="curp" required><br>
        <input type="submit" value="Buscar">
    </form>
    <br>
    <?php if ($nombre != ""): ?>
    <table border="1">
        <tr>
            <td>CURP</td>
            <td><?php echo $curp; ?></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><?php echo $nombre; ?></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><?php echo $ap_pat; ?></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><?php echo $ap_mat; ?></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><?php echo $fecha_nac; ?></td>
        </tr>
        <tr>
            <td>Escolaridad</td>
            <td><?php echo $escolaridad; ?></td>
        </tr>
        <tr>
            <td>Domicilio</td>
            <td><?php echo $domicilio; ?></td>
        </tr>
    </table>
    <?php endif; ?>
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

$curp = "";
$nombre = "";
$ap_pat = "";
$ap_mat = "";
$fecha_nac = "";
$escolaridad = "";
$domicilio = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curp = $_POST['curp'];

    $sql = "SELECT * FROM empleado WHERE Curp='$curp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nombre = $row["Nombre"];
            $ap_pat = $row["Ap_Pat"];
            $ap_mat = $row["Ap_Mat"];
            $fecha_nac = $row["Fecha_Nac"];
            $escolaridad = $row["Escolaridad"];
            $domicilio = $row["Domicilio"];
        }
    } else {
        echo "No se encontraron resultados";
    }
}
?>

