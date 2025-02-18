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

    $('#mas').click(function () {
        var currentVal = parseInt($('#agregar').val()) || 0;
        var maxValue = parseInt($('#agregar').attr('max'));
        if (currentVal < maxValue) {
            $('#agregar').val(currentVal + 1);
        }
    });

    $('#menos').click(function () {
        var currentVal = parseInt($('#agregar').val());
        if (currentVal > 1) {
            $('#agregar').val(currentVal - 1);
        }
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
</script>