<!-- Modal Update -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $product->id ?? '' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name-update" value="{{ $product -> name ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" id="description-update"
                        value="{{ $product -> description ?? '' }}" />
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="artwork-update">
                    <label class="custom-file-label custom-label-update" for="customFile">{{$media[0]}}</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="bnt-update" class="btn btn-primary" data-id="{{ $product->id ?? '' }}">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#artwork-update").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this)
                .siblings(".custom-label-update")
                .addClass("selected")
                .html(fileName);
        });
    })

</script>
