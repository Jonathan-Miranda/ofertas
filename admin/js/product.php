<script>
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
</script>