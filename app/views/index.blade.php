@extends('layouts.default')

@section('content')

<!-- Wrapper for slides -->
<!--Carrousel images must be 1024px x 523px-->
<div  class="responsive-slider">
    <div class="slides" data-group="slides">
        <ul>
           @foreach ($sliders as $slider)
                @if($slider->show === 1)
                    <li>
                        <div class="slide-body" data-group="slide">
                            <img src="/uploads/slider/{{ $slider->img_name }}">
                            @foreach ($slider->captions as $caption)
                                <div class="caption header" data-animate="{{$caption->data_animate}}" data-delay="{{$caption->data_delay}}" data-length="{{$caption->data_length}}" style="top:{{$caption->top_position}}%; left: {{$caption->left_position}}%";>
                                    @if ($caption->is_photo === 1)
                                        <img src="/uploads/captions/{{$caption->caption_image_name}}" style="width: 100%;">
                                    @else
                                        <h2>{{$caption->caption_body}}</h2>
                                    @endif
                                    <div class="caption sub" data-animate="slideAppearUpToDown" data-delay="800" data-length="300"></div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <a class="slider-control left" href="#" data-jump="prev"><</a>
    <a class="slider-control right" href="#" data-jump="next">></a>
</div>

<script>
$( document ).ready( function() {
        $('.responsive-slider').responsiveSlider({
            autoplay: true,
            interval: 5000,
            stopOnMouseover: false,
            transitionDistance: 300
        });
    });
</script>
@stop