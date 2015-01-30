@extends('layouts.default')

@section('content')

<div id="carousel" class="carousel slide" width="1024px">
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
    <div  id="carousel" class="responsive-slider" data-spy="responsive-slider" data-autoplay="true" data-interval="5000" data-transitiontime="300">
        <div>
            <ul>
                @foreach ($sliders as $slider)
                    @if($slider->show === 1)
                        <li>
                            <div class="slide-body" data-group="slide">
                                <img src="/uploads/slider/{{ $slider->img_name }}">
                                <div class="caption" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                                    <h3><i class="icon-gift"></i>{{ $slider->headline }}</h3>
                                    <div class="caption" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">{{ $slider->paragraph }}</div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforach
            </ul>
        </div>
    </div>
    <a class="slider-control left" href="#" data-jump="prev"><i class="icon-angle-left"></i></a>
    <a class="slider-control right" href="#" data-jump="next"><i class="icon-angle-right"></i></a>
    <div class="pages">
        <a class="page" href="#" data-jump-to="1">1</a>
        <a class="page" href="#" data-jump-to="2">2</a>
        <a class="page" href="#" data-jump-to="3">3</a>
    </div>
</div>

<script>
    $( document ).ready( function() {
        $('.responsive-slider').responsiveSlider();
    });
</script>
@stop