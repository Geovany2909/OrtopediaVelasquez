$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function fun_galery(id) {
    $.get("/galery/" + id, function (data) {
        console.log(data.name);
        $("#description").text(data.description);
        $("#imagen").attr("src", `images/products/${data.photo}`);
        modal();
    });
}


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
