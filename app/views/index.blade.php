@extends('layouts.default')

@section('content')
    <div style=" text-align: center">
        <h1>El C.R.U.D de KeleKe</h1>
    </div>
    <div class="slider" style="width: 1140px; height: 550px;">

        <div id="div1" class="slidingSpaces col-sm-12" style="height: 550px;" title="Page1" data-bgimage="/uploads/images/tucci_web_6.jpg">
            <span class="bord" style="color: red;">
                Content of div1
            </span>
        </div>
        <div id="div2" class="slidingSpaces col-sm-12" style="height: 550px;" title="Page2" data-bgimage="/uploads/images/tucci_web_7.jpg">
            <span class="bord" style="color: red;">
                Content of div2
            </span>
        </div>
        <div id="div3" class="slidingSpaces col-sm-12" style="height: 550px;" title="Page3" data-bgimage="/uploads/images/tucci_web_9.jpg">
            <span class="bord" style="color: red;">
                Content of div3
            </span>
        </div>
        <div id="div4" class="slidingSpaces col-sm-12" style="height: 550px;" title="Page4" data-bgimage="/uploads/images/tucci_web_16.jpg">
            <span class="bord" style="color: red;">
                Content of div4
            </span>
        </div>

<!--        <div id="div1" class="slidingSpaces" title="Page 1">-->
<!--            <img src="/uploads/images/tucci_web_6.jpg"alt="Responsive image">-->
<!--        </div>-->
<!--        <div id="div2" class="slidingSpaces" title="Page 2">-->
<!--            <img src="/uploads/images/tucci_web_7.jpg" alt="Responsive image">-->
<!--        </div>-->
<!--        <div id="div3" class="slidingSpaces" title="Page 3">-->
<!--            <img src="/uploads/images/tucci_web_9.jpg" alt="Responsive image">-->
<!--        </div>-->
<!--        <div id="div4" class="slidingSpaces" title="Page 4">-->
<!--            <img src="/uploads/images/tucci_web_16.jpg" alt="Responsive image">-->
<!--        </div>-->
<!--        <div id="div5" class="slidingSpaces" title="Page 5">-->
<!--            <img src="/uploads/images/tucci_web_19.jpg" alt="Responsive image">-->
<!--        </div>-->
    </div>



<script>

    var displace = [
        [
            {full:1},{full:1,moveDirection:'yx'},{full:1}
        ],
        [
            {full:0},{full:1,first:true},{full:0}
        ],
        [
            {full:0},{full:0,moveDirection:'yx'},{full:0}
        ]
    ];
    $(document).ready(function() {
        $(".slidingSpaces").ferroSlider({
            createMap               : true,
            mapPosition             : 'top_right',
            createSensibleAreas     : true,
            createTimeBar           : true,
            displace                : displace,
            autoSlide               : true,
            autoSlideTime           : 3000,
            createTimeBar           : true,

            container               : ".slider"
        });
    });

</script>
@stop