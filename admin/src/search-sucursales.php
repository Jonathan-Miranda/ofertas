<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    if (!empty($_POST['dato'])) {
        $buscar = $_POST['dato'];
        $query = "SELECT ID, NOMBRE, MAIL FROM admin 
        WHERE NOMBRE LIKE CONCAT('%', :dato, '%')
        OR MAIL LIKE CONCAT('%', :dato, '%')
        AND ROLL = '2'
        LIMIT 20";
    } else {
        $query = "SELECT ID, NOMBRE, MAIL FROM admin WHERE ROLL = '2' ORDER BY ID DESC LIMIT 20";
    }

    $stmt = $con->prepare($query);
    
    if (!empty($_POST['dato'])) {
        $stmt->bindParam(':dato', $buscar, PDO::PARAM_STR);
    }


    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <th><?php echo $data['NOMBRE']; ?></th>
                <td><?php echo $data['MAIL']; ?></td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit"
                        data-bs-id="<?php echo $data['ID']; ?>" 
                        data-bs-nombre="<?php echo $data['NOMBRE']; ?>"
                        data-bs-correo="<?php echo $data['MAIL']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar
                    </button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<tr>
        <td colspan="3">
        <div class="alert alert-danger" role="alert">No se encontraron sucursales</div>
        </td>
        </tr>';
    }

    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
?>