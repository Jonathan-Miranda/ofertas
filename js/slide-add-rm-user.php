<script>
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
            url: 'src/search.php',
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

    var swiper = new Swiper(".ganadores", {
        loop: true,
        grabCursor: true,
        slidesPerView: 4,
        spaceBetween: 30,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        },
        autoplay: {
            delay: 5000,
        },
    });

    $('#add-user').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "src/add-user.php",
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
                        window.location.href = "user.php";
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

    $('#edit-user').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "src/edit-user.php",
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
                        window.location.href = "user.php";
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

    $('#add-prod-user').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "src/add-prod-user.php",
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
                        window.location.href = "user.php";
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

    //add compra

    $(document).on('submit', '.add-compra', function (e) {
        e.preventDefault();
        const formulario = $(this).closest('form')[0]; // Obtiene el formulario específico
        const formData = new FormData(formulario);

        $.ajax({
            url: "src/compra-user.php",
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
                        window.location.href = "user.php";
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

    // premio

    $(document).on('submit', '.regalo', function (e) {
        e.preventDefault();
        const formulario = $(this).closest('form')[0]; // Obtiene el formulario específico
        const formData = new FormData(formulario);

        $.ajax({
            url: "src/premio.php",
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
                        window.location.href = "user.php";
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

    //add data modal edit-us
    document.addEventListener('DOMContentLoaded', function () {
        const exampleModal = document.getElementById('edit-us');

        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Botón que activó la modal
                const button = event.relatedTarget;

                // Extraer la información del botón
                const nombre = button.getAttribute('data-bs-nombre');
                const apellido = button.getAttribute('data-bs-apellido');
                const correo = button.getAttribute('data-bs-correo');
                const telefono = button.getAttribute('data-bs-telefono');
                const id = button.getAttribute('data-bs-id');

                // Actualizar los campos en la modal
                const modalTitle = exampleModal.querySelector('.modal-title');
                const inpName = exampleModal.querySelector('#edit-nombre');
                const inpApellido = exampleModal.querySelector('#edit-apellido');
                const inpMail = exampleModal.querySelector('#edit-mail');
                const inpTel = exampleModal.querySelector('#edit-tel');
                const inpid = exampleModal.querySelector('#edit-id');

                // Llenar los valores de la modal con los datos
                modalTitle.textContent = `Editar: ${nombre}`;
                inpName.value = nombre;
                inpApellido.value = apellido;
                inpMail.value = correo;
                inpTel.value = telefono;
                inpid.value = id;
            });
        }
    });
    //end add data modal edit-us

    //add data modal add-prod-us
    document.addEventListener('DOMContentLoaded', function () {
        const mdProdUs = document.getElementById('add-prod');

        if (mdProdUs) {
            mdProdUs.addEventListener('show.bs.modal', event => {
                // Botón que activó la modal
                const button = event.relatedTarget;

                // Extraer la información del botón
                const id = button.getAttribute('data-bs-id');

                // Actualizar los campos en la modal
                const inpid = mdProdUs.querySelector('#id-us');

                // Llenar los valores de la modal con los datos
                inpid.value = id;
            });
        }
    });
    //end add data modal add-prod-us

</script>