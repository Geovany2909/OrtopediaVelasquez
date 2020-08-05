$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

//pagina principal
function fun_galery(id) {
    $.get("/galery/" + id, function (data) {
        console.log(data.name);
        $("#description").text(data.description);
        $("#imagen").attr("src", `images/products/${data.photo}`);
        modal();
    });
}

function validarInput() {
    $('#edit').css("display", "inline-block");
}

function fun_galeryAdmin(id) {
    $.get("/admin/products/showOnlyProduct/" + id, function (data) {
        console.log(data.id);
        $("#imagen").attr("src", `/images/products/${data.photo}`);
        $("#form").attr(
            "action",
            `/admin/products/updateOnlyProduct/${data.id}`
        );
        modal();
    });
}


$("#edit").click(function (e) {
    var form = $(this).parents("form");
    var url = form.attr("action");
    var image = $("#inFile");

    $.ajax({
        type: "PUT",
        url: url,
        data: form.serialize(),
    success: function (data) {
        console.log(data);
    },
    error: function (data) {
                console.log(data);
            },
        });
});

function modal() {
    let modal = document.getElementById("tvesModal");
    let span = document.getElementsByClassName("close")[0];
    let body = document.getElementsByTagName("body")[0];

    modal.style.display = "block";
    body.style.position = "static";
    body.style.height = "100%";
    body.style.overflow = "hidden";

    span.onclick = function () {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
        }
    };
}
