
@section('content')
<div class="container">
    <div class="row" id="container">
        @foreach($photos as $photo)
            @if($photo->show === 1)
                <div class="item">
                <a href="/photos/{{ $photo->id }}">
                    <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive" alt="Responsive image" style=" height: 230px">
                </a>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>


    $( window ).load(function(){
        var container = document.querySelector('#container');
        var msnry = new Masonry( container, {
            // options
            isFitWidth:true,
            columnWidth: 200,
            itemSelector: '.item'
        });
        
    });
</script>

@stop