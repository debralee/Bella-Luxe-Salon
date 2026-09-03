<?php
include("common/footerPanel.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<script>
    const carousel = document.getElementById('galleryCarousel');
    const items = Array.from(carousel.querySelectorAll('.carousel-item'));
    const totalItems = items.length;

    function updateCarouselClasses() {
        const activeIndex = items.findIndex(item => item.classList.contains('active'));

        items.forEach((item, index) => {
            // Remove custom classes
            item.classList.remove('prev-item', 'next-item');

            // Calculate indices
            const prevIndex = (activeIndex - 1 + totalItems) % totalItems;
            const nextIndex = (activeIndex + 1) % totalItems;

            // Add custom classes
            if (index === prevIndex) {
                item.classList.add('prev-item');
            } else if (index === nextIndex) {
                item.classList.add('next-item');
            }
        });
    }

    // Update on slide events
    carousel.addEventListener('slid.bs.carousel', updateCarouselClasses);
    carousel.addEventListener('slide.bs.carousel', updateCarouselClasses);

    // Initial update
    updateCarouselClasses();
</script>
<script src="scripts/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript">
    $("#hamburger").click(function() {
        $("#nav").toggleClass("navT");
        $("#nav").toggleClass("navTT");
        $("#man").toggleClass("displayT");
        $("#heroHead").toggleClass("displayT");
        $("#button1").toggleClass("displayT");
        $("#button2").toggleClass("displayT");
    });
</script>
<script src="scripts/lightbox-plus-jquery.min.js"></script>
<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>

</body>
<!-- InstanceEnd -->

</html>