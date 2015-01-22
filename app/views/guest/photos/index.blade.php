<?php $pattern = ['w1', 'w2', 'w3', 'w4','w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11']; ?>

@section('content')
<div class="filters">
    <label><input type="checkbox" class="colections" val="4" />Dolls</label>
</div>

<div id="masonry-container" class="popup-gallery">
<!--Pseudo randomizer of image size-->
    @for($i = 0; $i < count($photos); $i++)
    @if($photos[$i]->show === 1)

    <div class="picture {{ $pattern[ ($i % count($pattern) ) ] }}">
        <a href="/uploads/images/{{$photos[$i]->img_name}}" title="{{$photos[$i]->title}}" description="{{$photos[$i]->description}}">
            <img src="/uploads/images/{{$photos[$i]->img_name}}" alt="alt" class="photo">
        </a>
    </div>

    @endif
    @endfor
</div>

<div id="fullscreen-image" class="hidden"><img /></div>

<script>
<!--    Massonery  -->
    $( window ).load(function(){
        var container = document.querySelector('#masonry-container');
        var msnry = new Masonry( container, {
            // options
            columnWidth: 190,
            itemSelector: '.picture'
        });

        $('.picture').each(function(){
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

<script>
<!--    Magnific Popup  -->
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {

                    return item.el.attr('title') + '<small>'+ item.el.attr('description') +'</small>';
                }
            }
        });
    });

</script>
<script>

    $(".filters").click(function() {
        $.ajax({
            type: "POST",
            url: "/filter",
            data: { id: $(this).children('input').attr("val"), filther: $(this).children('input').attr('class')}

        })

            .done(function( response ) {

                var photos = response.photos;
        })


    });

</script>
@stop