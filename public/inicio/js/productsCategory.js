let mensaje = $("#mensaje");
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#category").change(function (e) {
    e.preventDefault();
    $(".iterar").slideUp(500).fadeOut(1000);
    $("#oculto").slideUp(500).fadeOut(1000);
    setTimeout(() => {
        $(".iterar").html("");
        document.getElementById("oculto").style.display = "none";
    }, 1200);
    setTimeout(() => {
        let mensaje = $("#mensaje");
        let category = $(this).val();

        if (category === "all") {
            $.get("/products", function (data) {
                if (data.length === 0) {
                    mensaje.css("display", "block");
                } else {
                    $.each(data, function (i, item) {
                        mensaje.css("display", "none");
                        myString = `<div class='col-4'>
                            <img src='/images/products/${item.photo}'>
                            <h4>${item.name}</h4>
                        </div>`;
                        $(".iterar").append(myString);
                        $(".iterar").slideDown(2000).fadeIn(3000);
                    });
                }
            });
        } else {
            $.get("/products/" + category, function (data) {
                if (data.length === 0) {
                    mensaje.css("display", "block");
                } else {
                    $.each(data, function (i, item) {
                        $(".iterar").html("");
                        mensaje.css("display", "none");
                        myString = `<div class='col-4'>
                            <img src='/images/products/${item.photo}'>
                            <h4>${item.name}</h4>
                        </div>`;

                        $(".iterar").append(myString);
                        $(".iterar").slideDown(2000).fadeIn(3000);
                    });
                }
            });
        }
    }, 2000);
});
