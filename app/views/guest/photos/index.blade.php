
@section('content')

<div id="masonry-container">
    {{ $i = 0;}}
    @foreach($photos as $photo)
        @if($photo->show === 1)
                <a href="/photos/{{ $photo->id }}">
                    <img class="item {{ ($i % 2 == 0) ? 'quarter' : null }}" src="/uploads/images/{{$photo->img_name}}">
                </a>
        @endif
        {{ $i++;}}
    @endforeach
</div>

<script>

    $( window ).load(function(){
        var container = document.querySelector('#masonry-container');
        var msnry = new Masonry( container, {
          // options
          //columnWidth: 200,
          itemSelector: '.item'
        });
    });

</script>

@stop