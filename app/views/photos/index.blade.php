
@section('content')

    <a class="btn btn-success" href="photos/create" role="button">Nueva Foto</a>

        <div class="container marketing">
            <div class="row">
                <u>
                    @foreach($photos as $photo)
                    <div class="col-lg-4">
                        <a href="/photos/{{ $photo->id }}"><img class="img-rounded" src="/uploads/images/{{$photo->img_name}}" style="width: 150px;" ></a>

                        <h5>{{$photo->title}}<h5>
                    </div>


                    @endforeach
                </u>
            </div>
        </div>

@stop
