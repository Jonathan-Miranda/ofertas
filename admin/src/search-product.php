<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    if (!empty($_POST['dato'])) {
        $buscar = $_POST['dato'];
        $query = "SELECT p.ID, p.NOMBRE, p.OFERTA, l.NOMBRE AS LABORATORIO 
        FROM product p 
        LEFT JOIN lab l ON p.ID_LAB = l.ID 
        WHERE p.NOMBRE LIKE CONCAT('%', :dato, '%') 
        LIMIT 20";
    } else {
        $query = "SELECT p.ID, p.NOMBRE, p.OFERTA, l.NOMBRE AS LABORATORIO FROM product p LEFT JOIN lab l ON p.ID_LAB = l.ID ORDER BY p.ID DESC LIMIT 20";
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
                <td><?php echo $data['LABORATORIO']; ?></td>
                <td><?php echo $data['OFERTA']; ?></td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit"
                        data-bs-nombre="<?php echo $data['NOMBRE']; ?>" data-bs-id="<?php echo $data['ID']; ?>" data-bs-promo="<?php echo $data['OFERTA']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar
                    </button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<tr>
        <td colspan="4">
        <div class="alert alert-danger" role="alert">No se encontraron productos</div>
        </td>
        </tr>';
    }

    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
?>