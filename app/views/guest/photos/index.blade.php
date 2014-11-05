
@section('content')
<div class="container">
    <ul class="row" id="container">
        @foreach($photos as $photo)
            @if($photo->show === 1)
                <div class="item">
                <a href="/photos/{{ $photo->id }}">
                    <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive" alt="Responsive image" style=" height: 230px">
                </a>
                </div>
            @endif
        @endforeach
    </ul>
</div>

<script>

    var container = document.querySelector('#container');
    var msnry = new Masonry( container, {
        // options
        columnWidth: 60,
        itemSelector: '.item'
    });
    $(document).ready(function(){
        $('#content').msnry({
            itemSelector: '.item'
        }).imagesLoaded(function() {
            $('#content').msnry('reload');
        });
    });
</script>

@stop