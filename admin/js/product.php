<script>
    $(function () {
        buscar(''); // Ejecutar la función al cargar la página
    });
    // srch
    let debounceTimer; // temporizador

    $("#buscar").on("input", function () {
        clearTimeout(debounceTimer); // Reiniciar el temporizador en cada input
        debounceTimer = setTimeout(function () {
            buscar($("#buscar").val());
        }, 1000);
    });

    function buscar(dato) {
        $.ajax({
            type: 'POST',
            url: 'src/search-product.php',
            data: { dato: dato },
            success: function (response) {
                $("#result").html(response);
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error',
                    footer: 'Detalles del error: ' + xhr.responseText,
                    confirmButtonText: 'Cerrar'
                });
            }
        });
    }
    // end-srch
    // add product
    $('#add-prod').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "src/add-prod.php",
            type: "POST",
            dataType: "json",
            data: formData,
            processData: false,  // Evita que jQuery intente procesar los datos
            contentType: false,
            success: function (response) {
                if (response.icon == "success") {
                    Swal.fire({
                        icon: response.icon,
                        title: response.msj,
                    }).then(() => {
                        window.location.href = "product.php";
                    });
                } else {
                    Swal.fire({
                        icon: response.icon,
                        title: response.msj,
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error',
                    footer: 'Detalles del error: ' + xhr.responseText, // detalles del error
                    confirmButtonText: 'Cerrar'
                });
            }
        });
    });
    // end add product
    // edit prod
    $('#edit-prod').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "src/edit-prod.php",
            type: "POST",
            dataType: "json",
            data: formData,
            processData: false,  // Evita que jQuery intente procesar los datos
            contentType: false,
            success: function (response) {
                if (response.icon == "success") {
                    Swal.fire({
                        icon: response.icon,
                        title: response.msj,
                    }).then(() => {
                        window.location.href = "product.php";
                    });
                } else {
                    Swal.fire({
                        icon: response.icon,
                        title: response.msj,
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error',
                    footer: 'Detalles del error: ' + xhr.responseText, // detalles del error
                    confirmButtonText: 'Cerrar'
                });
            }
        });
    });
    // end edit prod
    //add data modal edit-prod
    document.addEventListener('DOMContentLoaded', function () {
        const exampleModal = document.getElementById('edit');

        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Botón que activó la modal
                const button = event.relatedTarget;

                // Extraer la información del botón
                const nombre = button.getAttribute('data-bs-nombre');
                const id = button.getAttribute('data-bs-id');

                // Actualizar los campos en la modal
                const modalTitle = exampleModal.querySelector('.modal-title');
                const inName = exampleModal.querySelector('#edit-nombre');
                const inprod = exampleModal.querySelector('#edit-id-prod');

                // Llenar los valores de la modal con los datos
                modalTitle.textContent = `Editar: ${nombre}`;
                inName.value = nombre;
                inprod.value = id;
            });
        }
    });
    //end add data modal edit-prod
</script>