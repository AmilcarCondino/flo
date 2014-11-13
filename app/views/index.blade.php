@extends('layouts.default')

@section('content')

<div id="carousel" class="carousel slide" width="1140px">
    <div class="carousel-title">
        <img src="/images/flo_tucci.png"/>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <!--Carrousel images must be 1024px x 523px-->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="/uploads/slider/slide_1.jpg">
            <div class="carousel-caption">
                <h3>Primera imagen</h3>
                <p>esta es la primera imagen del slide</p>
            </div>
        </div>
        <div class="item">
            <img src="/uploads/slider/slide_2.jpg">
            <div class="carousel-caption">
                <h3>Segunda imagen</h3>
                <p>esta es la segunda imagen del slide</p>
            </div>
        </div>
        <div class="item">
            <img src="/uploads/slider/slide_3.jpg">
            <div class="carousel-caption">
                <h3>Tercera imagen</h3>
                <p>esta es la tercera imagen del slide</p>
            </div>
        </div>
    </div>
</div>

<script>

    $( document ).ready(function() {
        $('.carousel').carousel({
            interval: 2000
        });
    });

</script>
@stop