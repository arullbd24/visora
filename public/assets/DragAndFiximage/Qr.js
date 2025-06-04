$(document).ready(function () {
    if ($image.length) {
        console.log("Gambar ditemukan:", $image);
        // Lanjutkan dengan logika lainnya...
    } else {
        console.error("Gambar tidak ditemukan di DOM!");
    }

    // Initialize drag and drop
    $(document).on("mousedown", "#dragElement", function (e) {
        isDragging = true;
        const $image = $(this);
        offsetX = e.clientX - $image.offset().left;
        offsetY = e.clientY - $image.offset().top;
        $image.css("cursor", "grabbing");
    });

    $(document).on("mousemove", function (e) {
        if (isDragging) {
            const $image = $("#dragElement");
            const x = e.clientX - offsetX;
            const y = e.clientY - offsetY;
            $image.css({
                position: "absolute",
                left: `${x}px`,
                top: `${y}px`,
            });
        }
    });

    $(document).on("mouseup", function () {
        if (isDragging) {
            isDragging = false;
            $("#dragElement").css("cursor", "grab");
        }
    });

    // Save position on button click
    $(document).on("click", "#savePosition", function () {
        const $image = $("#dragElement");
        const position = $image.position();
        $image.attr("data-fixed", "true");
        console.log("Position saved:", position);
        alert(`Image position fixed at: X=${position.left}, Y=${position.top}`);
    });
});