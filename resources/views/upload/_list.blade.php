@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@foreach($product as $item)
<div class="col-xl-3">
    <div class="card w-100 p-1">
        <div class="card-img-overlay text-right pt-1 pr-2 h-75">
            <form action="{{ route('upload.destroy',$item->id) }}" method="DELETE" class="form-delete">
                <a href="#" class="text-white" id="bnt-del" data-id="{{ $item->id ?? '' }}">X</a>
            </form>

        </div>
        <img class="card-img-top" src="{{$item->getFirstMediaUrl('products', 'thumb')}}" />
        <div class="card-body pb-1">
            <h5 class="card-title text-capitalize mb-1">{{ $item->name ?? '' }}</h5>
            <p class="card-text">{{ $item->description ?? '' }}</p>

            <form action="{{ route('upload.edit',$item->id) }}" method="GET" class="form-create">
                <a href="" id="bnt-create-update" data-id="{{ $item->id ?? '' }}" class="btn-sm btn-primary">Update</a>
            </form>
        </div>
    </div>
</div>
@endforeach
