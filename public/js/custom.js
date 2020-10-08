$(document).ready(function () {
    /***
     * Change label file input when selected file
     */
    $(".custom-file-upload").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-label-upload")
            .addClass("selected")
            .html(fileName);
    });

    /***
     *
     * Settup CSRF TOKEN
     */

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
