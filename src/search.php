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

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" 
                                    data-bs-target="#edit-us" 
                                    data-bs-nombre="<?php echo $data['NOMBRE']; ?>" 
                                    data-bs-apellido="<?php echo $data['APELLIDO']; ?>" 
                                    data-bs-correo="<?php echo $data['CORREO']; ?>" 
                                    data-bs-telefono="<?php echo $data['TELEFONO']; ?>"
                                    data-bs-id="<?php echo $data['ID']; ?>">
                                        <i class="bi bi-pencil-square"></i> Editar usuario
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-prod">
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
                                                <tr>
                                                    <th>Ky6</th>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>
                                                        <div class="container">
                                                            <div class="input-group">
                                                                <button class="btn btn-secondary" type="button" id="menos"><i
                                                                        class="bi bi-dash"></i></button>
                                                                <input type="number" class="form-control" id="agregar" max="2" min="1">
                                                                <button class="btn btn-secondary" type="button" id="mas"><i
                                                                        class="bi bi-plus"></i></button>
                                                            </div>

                                                            <div class="d-grid mt-3">
                                                                <button class="btn btn-success" type="button"
                                                                    id="btn-add">Agregar</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Fayrus</th>
                                                    <td>2</td>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="d-grid mt-3">
                                                            <button type="button" class="btn btn-warning">
                                                                Canjear🎉
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
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