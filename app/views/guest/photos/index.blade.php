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

        $('.item').each(function(){
            var img = $(this).find('img');
            var tall_brick = ($(this).height() > $(this).width());
            var tall_img = (img.height() > img.width());

            if(tall_brick){
                img.css({'max-height': $(this).height()});
                var margin = ( img.width()-$(this).width() )/2;
                img.css({'margin-left': -margin});
            }else{
                if(tall_img){
                    img.css({'max-width': $(this).width()});
                    var margin = ( img.height()-$(this).height() )/2;
                    img.css({'margin-top': -margin});
                }else{
                    img.css({'max-height': $(this).height()});
                    var margin = ( img.width()-$(this).width() )/2;
                    img.css({'margin-left': -margin});
                }
            }

        });
    });
</script>

@stop