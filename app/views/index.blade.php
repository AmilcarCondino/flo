@extends('layouts.default')

@section('content')


    <!-- Indicators -->
<!--    <ol class="carousel-indicators">-->
<!--        @for($i = 0; $i < count($sliders); $i++)-->
<!--            @if($sliders[$i]->show === 1)-->
<!--                <li data-target="#carousel" data-slide-to=" {{ $i }} " class="{{ ($sliders[$i]->order === 1) ? 'active' : null; }}"></li>-->
<!--            @endif-->
<!--        @endfor-->
<!--    </ol>-->
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
                            <div class="caption header" data-animate="slideAppearLeftToRight" data-delay="500" data-length="300" style="top: 5%; left: 90%; margin-left: -100; margin-right: 100;">
                                <h3>{{ $slider->headline }}</h3>
                                <div class="caption sub" data-animate="slideAppearUpToDown" data-delay="800" data-length="300">{{ $slider->paragraph }}</div>
                            </div>
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
            transitionTime: 300
        });
    });
</script>
@stop