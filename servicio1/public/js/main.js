document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById("popup");
    const popupContent = document.getElementById("popupContent");
    const programasButton = document.getElementById("programasButton");
    const profileImageLink = document.getElementById("profileImageLink");
    const closePopupButton = document.querySelector('.floating-window .close-button');

    function toggleWindow() {
        if (popup.style.display === "none" || popup.style.display === "") {
            let url;

            if (this.id === "programasButton") {
                url = "<?= $urlConstant ?>inscripcion";
            } else {
                url = "<?= $urlConstant ?>perfil";
            }

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    popupContent.innerHTML = data;
                    popup.style.display = "grid";

                    if (this.id === "programasButton") {
                        $(".carousel").slick({
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            prevArrow: '<button type="button" class="slick-prev">Prev</button>',
                            nextArrow: '<button type="button" class="slick-next">Next</button>',
                        });
                        equalizeCarouselItemHeights();
                    }
                })
                .catch(error => {
                    console.error("Error al cargar la vista:", error);
                });

        } else {
            popup.style.display = "none";
            popupContent.innerHTML = "";
        }
    }

    function equalizeCarouselItemHeights() {
        const carouselItems = document.querySelectorAll('.item2');
        let maxHeight = 0;

        carouselItems.forEach(item => {
            item.style.height = 'auto';
            const itemHeight = item.offsetHeight;
            if (itemHeight > maxHeight) {
                maxHeight = itemHeight;
            }
        });

        carouselItems.forEach(item => {
            item.style.height = maxHeight + 'px';
        });
    }

    programasButton.addEventListener("click", toggleWindow);
    profileImageLink.addEventListener("click", toggleWindow);
    closePopupButton.addEventListener("click", toggleWindow);
    
    window.addEventListener('resize', equalizeCarouselItemHeights);
});
