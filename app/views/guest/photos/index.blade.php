
@section('content')
<div class="container">
    <div class="row" id="container">
        @foreach($photos as $photo)
            @if($photo->show === 1)
            <div class="col-sm-4 ">
                <div class="item">
                <a href="/photos/{{ $photo->id }}">
                    <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 120px">
                </a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function(){
        var container = document.querySelector('#container');
        var msnry = new Masonry( container, {
            // options
            columnWidth: 60,
            itemSelector: '.item'
        });
    });
</script>

@stop