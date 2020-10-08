// Spinner Loading

const spinnerLoading =
    ' <span class="spinner-grow spinner-grow-sm"' +
    'role="status" aria-hidden="true"></span>';

// Upload
function upload(obj) {
    $(obj).html(spinnerLoading);
    const csrf = $('meta[name="csrf-token"]').attr("content");
    let form_data = new FormData();

    const name = $("#name").val();
    const description = $("#description").val();
    $('input[type="file"]').each(function () {
        var file_cover = $("#artwork").prop("files")[0];
        form_data.append("image", file_cover);
    });

    form_data.append("name", name);
    form_data.append("_token", csrf);
    form_data.append("description", description);

    $.ajax({
        url: $("#form-upload").attr("action"),
        cache: false,
        contentType: false,
        processData: false,
        type: "post",
        data: form_data,
        success: function (result) {
            $("#list-items").html("");
            $("#list-items").html(result);
        },
        error: function (err) {
            console.log(err.responseJSON.errors);
        },
    }).then(() => {
        $(obj).html("Submit");
    });
}

// Destroy
function destroy(obj) {
    const csrf = $('meta[name="csrf-token"]').attr("content");
    const id = [];
    id.push($(obj).attr("data-id"));
    $.ajax({
        url: $(".form-delete").attr("action"),
        cache: false,
        type: "DELETE",
        data: {
            id: id,
            _token: csrf,
        },
        success: function (result) {
            $("#list-items").html("");
            $("#list-items").html(result);
        },
    });
}

//Create

function create(obj) {
    $(obj).html(spinnerLoading);
    const csrf = $('meta[name="csrf-token"]').attr("content");

    const id = $(obj).attr("data-id");
    $.ajax({
        url: $(".form-create").attr("action"),
        cache: false,
        type: "GET",
        data: {
            id: id,
            _token: csrf,
        },
        success: function (result) {
            $(".container-update").html("");
            $(".container-update").html(result);
        },
    }).then(() => {
        console.log("xong");
        $("#modal-update").modal("show");
        $(obj).html("Update");
    });
}

//Update
function update(obj) {
    $(obj).html(spinnerLoading);
    const form_data = new FormData();
    const csrf = $('meta[name="csrf-token"]').attr("content");
    const id = $(obj).data("id");

    const name = $("#name-update").val();
    const description = $("#description-update").val();
    const artwork = $("#artwork-update").val();

    if (artwork) {
        $('input[type="file"]').each(function () {
            var file_cover = $("#artwork-update").prop("files")[0];
            form_data.append("image", file_cover);
        });
    }

    form_data.append("id", id);
    form_data.append("name", name);
    form_data.append("_token", csrf);
    form_data.append("description", description);

    $.ajax({
        url: "upload/fetch/update",
        cache: false,
        type: "POST",
        contentType: false,
        processData: false,
        data: form_data,
        success: function (result) {
            $("#list-items").html("");
            $("#list-items").html(result);
        },
    }).then(() => {
        $("#modal-update").modal("hide");
    });
}

export { destroy, upload, create, update };
