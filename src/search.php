<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {
    require("../connection/conexion.php");

    if (!empty($_POST['dato'])) {
        $buscar = $_POST['dato'];

        $query = "SELECT ID, NOMBRE, APELLIDO, CORREO, TELEFONO 
        FROM user 
        WHERE NOMBRE LIKE CONCAT('%', :dato, '%') 
        OR APELLIDO LIKE CONCAT('%', :dato, '%') 
        OR CORREO LIKE CONCAT('%', :dato, '%') 
        OR TELEFONO LIKE CONCAT('%', :dato, '%') LIMIT 1";

        $stmt = $con->prepare($query);
        $stmt->bindParam(':dato', $buscar, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header"></div>
                        <div class="card-body px-5">
                            <div class="row">

                                <div class="col-md-6 m-auto">
                                    <p class="fs-1"><?= htmlspecialchars($data['NOMBRE'] . " " . $data['APELLIDO']) ?></p>
                                    <p class="fs-3">📬<?= htmlspecialchars($data['CORREO']) ?></p>
                                    <p class="fs-3">📞 <?= htmlspecialchars($data['TELEFONO']) ?></p>

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-us"
                                        data-bs-nombre="<?php echo $data['NOMBRE']; ?>"
                                        data-bs-apellido="<?php echo $data['APELLIDO']; ?>"
                                        data-bs-correo="<?php echo $data['CORREO']; ?>"
                                        data-bs-telefono="<?php echo $data['TELEFONO']; ?>" data-bs-id="<?php echo $data['ID']; ?>">
                                        <i class="bi bi-pencil-square"></i> Editar usuario
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-prod"
                                        data-bs-id="<?php echo $data['ID']; ?>">
                                        + Agregar producto
                                    </button>

                                </div>

                                <div class="col-md-6">

                                    <div class="text-center mb-3">
                                        <span class="fs-4">📦Productos</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Comprados</th>
                                                    <th scope="col">Faltantes</th>
                                                    <th scope="col">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q_p_us = "SELECT 
                                                p.ID AS ProductoID, 
                                                p.NOMBRE AS ProductoNombre, 
                                                pr.ID AS PromoID, 
                                                pr.COMPRADOS, 
                                                pr.FALTANTES 
                                                FROM promo pr 
                                                JOIN user_product up ON pr.ID_USER_PRODUCT = up.ID 
                                                JOIN product p ON up.ID_PRODUCT = p.ID 
                                                WHERE up.ID_USER = :id_us";

                                                $r_qPu = $con->prepare($q_p_us);
                                                $r_qPu->bindParam(':id_us', $data['ID'], PDO::PARAM_INT);
                                                $r_qPu->execute();

                                                if ($r_qPu->rowCount() > 0) {
                                                    while ($d = $r_qPu->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $d['ProductoNombre']; ?></th>
                                                            <td><?php echo $d['COMPRADOS']; ?></td>
                                                            <td><?php echo $d['FALTANTES']; ?></td>
                                                            <td>
                                                                <div class="container">
                                                                    <?php
                                                                    if ($d['FALTANTES'] > 0) {
                                                                        ?>

                                                                        <form class="add-compra" method="POST" enctype="multipart/form-data"
                                                                            accept-charset="utf-8">

                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control" name="cantidad"
                                                                                    max="<?php echo $d['FALTANTES']; ?>" min="1" required />
                                                                            </div>
                                                                            <input type="hidden" name="id-user" value="<?php echo $data['ID']; ?>"
                                                                                required>
                                                                            <input type="hidden" name="id-product"
                                                                                value="<?php echo $d['ProductoID']; ?>" required>
                                                                            <input type="hidden" name="id-promo"
                                                                                value="<?php echo $d['PromoID']; ?>" required>
                                                                            <input type="hidden" name="faltante"
                                                                                value="<?php echo $d['FALTANTES']; ?>" required>
                                                                            <div class="d-grid mt-3">
                                                                                <input type="submit" value="Agregar" class="btn btn-success" />
                                                                            </div>
                                                                        </form>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <form class="regalo" method="POST" enctype="multipart/form-data"
                                                                            accept-charset="utf-8">
                                                                            <div class="d-grid">
                                                                                <input type="hidden" name="id-us-regalo"
                                                                                    value="<?php echo $data['ID']; ?>" required>
                                                                                <input type="hidden" name="id-prod-regalo"
                                                                                    value="<?php echo $d['ProductoID']; ?>" required>
                                                                                <input type="hidden" name="id-promo"
                                                                                    value="<?php echo $d['PromoID']; ?>" required>
                                                                                <input type="submit" value="Canjear🎉" class="btn btn-warning" />
                                                                            </div>
                                                                        </form>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo '<div class="alert alert-danger" role="alert">Aún no hay productos registrados</div>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No se encontró ningún usuario</div>';
        }
    } else {
        echo '
        <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header"></div>
                        <div class="card-body px-5">
                            <div class="row">
                                <div class="col-md-6 m-auto">
                                    <p class="fs-3">Para ver la información del usuario usa la barra de busqueda🔎</p>
                                </div>
                                <div class="col-md-6 m-auto">
                                    <p class="fs-4">Puedes buscar usuarios por:</p>
                                    <p class="fs-5">✏️ Nombre</p>
                                    <p class="fs-5">📧 Correo</p>
                                    <p class="fs-5">📞 Telefono</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ';
    }

    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
?>