let mensaje = $("#mensaje");
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#category").change(function (e) {
    e.preventDefault();
    $(".iterar").slideUp(500).fadeOut(800);
    $("#oculto").slideUp(500).fadeOut(800);
    setTimeout(() => {
        $(".iterar").html("");
        $("#numeros").html("");
        document.getElementById("oculto").style.display = "none";
    }, 1000);
    setTimeout(() => {
        let mensaje = $("#mensaje");
        let category = $(this).val();

        if (category != "") {
            if (category === "all") {
                $.get("/products", function (data) {
                    if (data.length === 0) {
                        mensaje.css("display", "block");
                    } else {
                        $("#numeros").html(`${data.length} elementos en total`);
                        $.each(data, function (i, item) {
                            mensaje.css("display", "none");
                            myString = `
                            <form action='/contacts/p=${item.name}'
                                <div class='col-4 work__img'>
                                    <img oncontextmenu="return false;" src='/images/products/${item.photo}'>
                                    <h4>${item.name}</h4>
                                </div>
                                <button type='submit'>Mas Información</button>
                            </form>`;
                            $(".iterar").append(myString);
                            $(".iterar").slideDown(1000).fadeIn(2000);
                        });
                    }
                });
            } else {
                $.get("/products/" + category, function (data) {
                    if (data.length === 0) {
                        mensaje.css("display", "block");
                    } else {
                        $("#numeros").html(`${data.length} elementos en total`);
                        $.each(data, function (i, item) {
                            mensaje.css("display", "none");
                            myString = `
                            <form action='/contacts/p=${item.name}'
                                <div class='col-4 work__img'>
                                    <img oncontextmenu="return false;" src='/images/products/${item.photo}'>
                                    <h4>${item.name}</h4>
                                </div>
                                <button type='submit'>Mas Información</button>
                            </form>`;
                            $(".iterar").append(myString);
                            $(".iterar").slideDown(1000).fadeIn(2000);
                        });
                    }
                });
            }
        }
    }, 1500);
});
