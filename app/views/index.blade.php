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
            autoSlide               : true,
            container               : ".slider",
            time                    : 1600,
            createPlayer			: true,
            createMap               : true,
            createSensibleAreas     : true,
            createTimeBar           : true,
            displace                : displace,
            mapPosition             : 'top_right',
            playerPosition          : 'bottom_right'
        });
    });

</script>
@stop