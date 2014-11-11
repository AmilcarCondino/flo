@extends('layouts.default')

@section('content')
    <div style=" text-align: center">
        <h1>El C.R.U.D de KeleKe</h1>
        <div id="div1" class="slidingSpaces" title="Page 1">
            first page
        </div>
        <div id="div2" class="slidingSpaces" title="Page 2">
            second page
        </div>
        <div id="div3" class="slidingSpaces" title="Page 3">
            third page
        </div>
        <div id="div4" class="slidingSpaces" title="Page 4">
            fourth page
        </div>
        <div id="div5" class="slidingSpaces" title="Page 5">
            fifth page
        </div>
    </div>


<script>

    var matrix = [
        [
            {full:0},{full:1,moveDirection:'yx'},{full:0}
        ],
        [
            {full:1},{full:1,first:true},{full:1}
        ],
        [
            {full:0},{full:1,moveDirection:'yx'},{full:0}
        ]
    ];
    $(document).ready(function() {
        $(".slidingSpaces").ferroSlider({
            axis                    : 'xy',
            displace                : false,
            createMap               : true,
            mapPosition             : '85%_center',
            createSensibleAreas     : true
        });
    });

</script>
@stop