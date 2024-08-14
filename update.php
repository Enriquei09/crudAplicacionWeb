<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Empleado</title>
</head>
<body>
    <h1>Actualizar Empleado</h1>
    <form method="post" action="">
        Curp: <input type="text" name="curp" value="<?php echo $curp; ?>" required><br>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <?php if ($nombre != ""): ?>
    <form method="post" action="">
        <input type="hidden" name="curp" value="<?php echo $curp; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
        Apellido Paterno: <input type="text" name="ap_pat" value="<?php echo $ap_pat; ?>" required><br>
        Apellido Materno: <input type="text" name="ap_mat" value="<?php echo $ap_mat; ?>" required><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nac" value="<?php echo $fecha_nac; ?>" required><br>
        Escolaridad: <input type="text" name="escolaridad" value="<?php echo $escolaridad; ?>" required><br>
        Domicilio: <input type="text" name="domicilio" value="<?php echo $domicilio; ?>" required><br>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>
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
    if (isset($_POST['buscar'])) {
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
    } elseif (isset($_POST['actualizar'])) {
        $curp = $_POST['curp'];
        $nombre = $_POST['nombre'];
        $ap_pat = $_POST['ap_pat'];
        $ap_mat = $_POST['ap_mat'];
        $fecha_nac = $_POST['fecha_nac'];
        $escolaridad = $_POST['escolaridad'];
        $domicilio = $_POST['domicilio'];

        $sql = "UPDATE empleado SET Nombre='$nombre', Ap_Pat='$ap_pat', Ap_Mat='$ap_mat', Fecha_Nac='$fecha_nac', Escolaridad='$escolaridad', Domicilio='$domicilio' WHERE Curp='$curp'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado con éxito";
        } else {
            echo "Error actualizando registro: " . $conn->error;
        }
    }
}
?>


