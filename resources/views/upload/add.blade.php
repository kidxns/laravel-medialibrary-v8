@extends('upload/index')
@section('content')
<div class="container shadow-sm p-3 mt-5">
    <h3 class="mb-1">LARAVEL MEDIALIBRARY V8</h3>
    <form action="{{route('upload.store')}}" method="post" id="form-upload">

        <div class="form-group">
            <label for="" class="h6">Name</label>
            <input type="text" class="form-control" id="name" />
        </div>


        <div class="form-group">
            <label for="description" class="h6">Description</label>
            <input type="text" class="form-control" id="description" />
        </div>

        <div class="form-group">
            <label for="description" class="h6">Images</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input custom-file-upload" id="artwork">
                <label class="custom-file-label custom-label-upload" for="artwork">Choose images</label>
            </div>
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary w-100" type="button" class="form-control" id="bnt-upload">Submit</button>
        </div>
    </form>
    <div class="container-update">
    </div>

    <div class="row mt-5" id="list-items">
        @include('upload/_list')
    </div>

</div>




<script type="module">

    //Import functions from Product.js
import {destroy, upload, create, update} from './js/product.js';

$(document).ready(function () {
    // Event click upload button
    $(document).on('click','#bnt-upload',function (e) {
    e.preventDefault();
     upload(this);
    });

    // Event click on delete button
    $(document).on('click','#bnt-del',function (e) {
    e.preventDefault();
    destroy(this);
   });

   // Event click on create button
   $(document).on('click','#bnt-create-update',function (e) {
    e.preventDefault();
    create(this);
   });

   // Event click on update button
   $(document).on('click','#bnt-update',function (e) {
    e.preventDefault();
    update(this);
   });

 })

</script>


@endsection
