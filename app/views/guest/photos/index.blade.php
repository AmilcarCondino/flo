
@section('content')
<div class="container">
    <div class="row">
        @foreach($photos as $photo)
            @if($photo->show === 1)
            <div class="col-sm-4">
                <h5>{{$photo->title}}</h5>
                <a href="/photos/{{ $photo->id }}">
                    <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 120px">
                </a>
            </div>
            @endif
        @endforeach
    </div>
</div>
@stop
