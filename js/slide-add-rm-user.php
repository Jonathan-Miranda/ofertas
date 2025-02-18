    <script>
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
    </script>