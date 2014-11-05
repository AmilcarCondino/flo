<?php $pattern = [null, 'w2 h2', 'h3', 'h2', 'w3', null, null, 'h2', 'w2 h3', null, 'h2', null, 'w2 h2', 'w2', null, 'h2', null, null, 'h3', 'h2', null, null, 'h2']; ?>

@section('content')

<div id="masonry-container">
    @for($i = 0; $i < count($photos); $i++)
        @if($photos[$i]->show === 1)
            <div class="item {{ $pattern[ ($i % count($pattern) ) ] }}">
                <a href="/photos/{{ $photos[$i]->id }}">
                    <img src="/uploads/images/{{$photos[$i]->img_name}}" alt="alt">
                </a>
            </div>
        @endif
    @endfor
</div>

<script>
    $( window ).load(function(){
        var container = document.querySelector('#masonry-container');
        var msnry = new Masonry( container, {
          // options
          columnWidth: 190,
          itemSelector: '.item'
        });
    });
</script>

@stop