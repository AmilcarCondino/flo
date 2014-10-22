
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <a class="btn btn-success" href="photos/create" role="button">Nueva Foto</a>
        </div>
    </div>
    <div class="row">
        @foreach($photos as $photo)
            <div class="col-sm-4">
                <h5>{{$photo->title}}</h5>
                <a href="/photos/{{ $photo->id }}">
                    <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 120px">
                </a>
            </div>
        @endforeach
    </div>
</div>
@stop
