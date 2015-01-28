@extends('layouts.default')

@section('content')

<div id="carousel" class="carousel slide" width="1140px">
    <div class="carousel-title">
        <img src="/images/flo_tucci.png"/>
    </div>
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
    <div class="carousel" id="carousel">
        @foreach ($sliders as $slider)
            @if($slider->show === 1)
                <div class="item" id="{{ $slider->img_name }}" title="{{ $slider->img_name }}">
                    <img src="/uploads/slider/{{ $slider->img_name }}">
                    <div class="caption">
                        <h3>{{ $slider->headline }}</h3>
                        <p>{{ $slider->paragraph }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>

    $(document).ready(function() {
        $('.item').ferroSlider({
            createMap               : true,
            createSensibleAreas     : true,
            autoSlide               : true,
            autoSlideTime           : 2000,
            createTimeBar           : true,
            timeBarInsidePlayer     : false,
            mapPosition				: 'bottom_center'
        });
    });


//    $( document ).ready(function() {
//        $('.carousel').carousel({
//            interval: 3000
//        });
//    });

</script>
@stop